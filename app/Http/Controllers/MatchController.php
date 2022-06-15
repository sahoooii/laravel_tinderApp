<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;

class MatchController extends Controller
{
    public function index()
    {
        //自分にlikeしてくれたuser ids
        $likedUserIds = Swipe::where('to_user_id', \Auth::user()->id)
                        ->where('is_like', true)
                        ->pluck('from_user_id');

        $matchedUsers = Swipe::where('from_user_id',  \Auth::user()->id)
                        ->whereIn('to_user_id', $likedUserIds)
                        ->where('is_like', true)
                        ->with('toUser')
                        ->get();
        // dd( $matchedUsers);

        return view('pages.match.index', compact('matchedUsers'));
    }
}
