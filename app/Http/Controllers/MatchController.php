<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;

class MatchController extends Controller
{
    public function index()
    {
        //loginしているuser情報
        $user = User::find(\Auth::user()->id);

        //自分にlikeしてくれたuser ids
        $likedUserIds = Swipe::where('to_user_id', \Auth::user()->id)
                        ->where('is_like', true)
                        ->pluck('from_user_id');

        $matchedUsers = Swipe::where('from_user_id', \Auth::user()->id)
                        ->whereIn('to_user_id', $likedUserIds)
                        ->where('is_like', true)
                        ->with('toUser')
                        ->paginate(5);

        return view('pages.match.index', compact('user', 'matchedUsers'));
    }

    public function show($id)
    {
        $user = User::find(\Auth::user()->id);

        $matchedUserInfo = User::find($id);

        //gender表記
        if ($matchedUserInfo->gender === 0) {
            $gender = 'male';
        }
        if ($matchedUserInfo->gender === 1) {
            $gender = 'female';
        }

        //search_status表記
        if ($matchedUserInfo->search_status === 0) {
            $search_status = 'Relationship';
        }
        if ($matchedUserInfo->search_status === 1) {
            $search_status = 'Something Casual';
        }
        if ($matchedUserInfo->search_status === 2) {
            $search_status = 'Friend';
        }

        return view('pages.match.show', compact('user', 'matchedUserInfo', 'gender', 'search_status'));
    }
}
