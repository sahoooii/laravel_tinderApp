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
        // $user = User::find(1);

        //すでにswipeしたuserを省いて、idsを取得
        $swipedUserIds = Swipe::where('from_user_id', \Auth::user()->id )->get()->pluck('to_user_id');
        //swipeしていないuserを1つ取得
        $user = User::where('id', '<>', \Auth::user()->id)->whereNotIn('id', $swipedUserIds)->first();

        // dd($user->name);
        return view('pages.user.index', compact('user'));
    }

    public function show($id)
    {
        $user = User::find(\Auth::user()->id);

        // dd($user->name);

        return view('pages.user.show', compact('user'));
    }

}
