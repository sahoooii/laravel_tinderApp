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
        // $swipe = User::find(1)->swipe;

        // dd($swipe);

        // dd($user->id);

        return view('pages.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find(\Auth::user()->id);

        // dd($user->id);

        return view('pages.user.edit', compact('user'));
    }
}
