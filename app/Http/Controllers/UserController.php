<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        //loginしているuser情報
        $user = User::find(\Auth::user()->id);

        //すでにswipeしたuserを省いて、idsを取得
        $swipedUserIds = Swipe::where('from_user_id', \Auth::user()->id)->get()->pluck('to_user_id');
        //swipeしていないuserを1つ取得
        $notSwipeUser = User::where('id', '<>', \Auth::user()->id)->whereNotIn('id', $swipedUserIds)->first();

        // dd($user->name);
        return view('pages.user.index', compact('notSwipeUser', 'user'));
    }

    // public function show($id)
    // {
    //     $user = User::find(\Auth::user()->id);
    //     // dd($user);

    //     return view('pages.user.show', compact('user'));
    // }

    public function edit($id)
    {
        $user = User::find(\Auth::user()->id);

        // dd($user->password);

        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', function ($name, $item, $fail) {
                // もし既に使用されているemailなら弾く
                if (count(User::where([
                        ['email', $item],
                        ['id', '<>',\Auth::user()->id]
                    ])->get())) {
                    $fail('This email address is already in use.');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find(\Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);

        //imgをuploadしなくてもerrorにならないように
        if (!is_null($request->file('image')) && $request->file('image')->isValid()) {
            $user->img_url = $fileName = $request->file('image')->getClientOriginalName();//file名取得
            Storage::putFileAs('public/images', $request->file('image'), $fileName);
            $fullFilePath = '/storage/images/' . $fileName;
            $user->img_url =  $fullFilePath;
        }

        $user->save();

        return redirect()
        ->route('users.index')
        ->with('flash_message', 'Updated your profile!');
    }
}
