<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;

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

    public function show($id)
    {
        $user = User::find(\Auth::user()->id);
        // dd($user);

        return view('pages.user.show', compact('user'));
    }

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $img_url = $request->img_url;
        // dd($img_url);
        if (!is_null($img_url) && $img_url->isValid()) {
            $fileNameToStore =RegisterController::create($img_url);
        }

        $user = User::find(\Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);

        // if (!is_null($img_url) && $img_url->isValid()) {
        //     $user->image = $fileNameToStore;
        // }

        $user->save();

        return redirect()
        ->route('users.index')
        ->with('flash_message', 'Updated your profile!');
    }
}
