<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\DB;

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

        // dd($user);

        return view('pages.user.edit', compact('user'));
    }

    // public function update(Request $request, $id)
    // {
    //     $user = User::find(\Auth::user()->id);

    //     // $user->img_url = $request->input('img_url');
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = $request->input('password');
    //     $user->password_confirmation = $request->input('password_confirmation');

    //     $user->save();
    //     // dd($user);
    //     return redirect('pages.user.index', compact('user'));
    // }
}
