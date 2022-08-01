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
        $likedUserIds = Swipe::where('to_user_id', $user->id)
                        ->where('is_like', true)
                        ->pluck('from_user_id');

        $matchedUsers = Swipe::where('from_user_id', $user->id)
                        ->whereIn('to_user_id', $likedUserIds)
                        ->where('is_like', true)
                        ->with('toUser')
                        ->paginate(5);

        return view('pages.match.index', compact('user', 'matchedUsers'));
    }

    public function show($id)
    {
    $user = User::find(\Auth::user()->id);

    //パラメータのidを取得
    if (is_null(User::find($id))) {
        return redirect()
        ->route('matches.index');
    } else {
        $user_id = User::find($id)->id;
    }
    // dd($user_id);

    //自分とマッチした人の情報だけ取得
    //自分にlikeしてくれたuser ids
    $likedUserIds = Swipe::where('to_user_id', $user->id)
                    ->where('is_like', true)
                    ->pluck('from_user_id');

    //自分がマッチしたuserの情報のみを取得する
    $matchedUsers = Swipe::where('from_user_id', $user->id)
                    ->whereIn('to_user_id', $likedUserIds)
                    ->where('is_like', true)
                    ->get();

    $matchedUserIds = [];
    foreach ($matchedUsers as $matchedUser) {
        $matchedUserIds[] = $matchedUser->to_user_id;
        $result = in_array($user_id, $matchedUserIds);
    }
    // dd($result);

    if ($result) {
        $matchedUserInfo =  User::find($id);
    } else {
        return redirect()
        ->route('matches.index')
        ->with(['flash_message' => 'You can see only your matched user.',
                'status' => 'alert'
        ]);
    }
        // dd($result['to_user_id']);
        // $memo = Memo::where('status', 1)->where('id', $id)->where('user_id', $user->id)->first();
        // $matchedUserInfo = User::where('id', $matchedUserId)->get();
        // dd($matchedUserId);

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

        return view('pages.match.show', compact('user', 'matchedUsers', 'matchedUserInfo', 'gender', 'search_status'));
    }
}
