<?php

namespace App\Services;

use App\Models\User;
use App\Models\Swipe;

class SearchGenderService
{
    public static function searchGender($search_gender, $user_gender)
    {
        //loginしているuser情報
        $user = User::find(\Auth::user()->id);
        //すでにswipeしたuserを省いて、idsを取得
        $swipedUserIds = Swipe::where('from_user_id', $user->id)->get()->pluck('to_user_id');

        //swipeしていないuserを1つ取得,search_genderで切り分け man=0 woman=1 both=2
        //look for both(2) $user_gender=man
        if ($search_gender === 2 && $user_gender === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->whereIn('gender', [0,1])->whereIn('search_gender', [0, 2])->first();
        }
        //look for both(2) $user_gender=woman
        if ($search_gender === 2 && $user_gender === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->whereIn('gender', [0,1])->whereIn('search_gender', [1, 2])->first();
        }

        //look for man(0) man to man, man to woman
        if ($search_gender === 0 && $user_gender === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [0,2])->first();
        } elseif ($search_gender === 0 && $user_gender === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [1,2])->first();
        }
		
        //look for woman(1) woman to woman, woman to man
        if ($search_gender === 1 && $user_gender === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [1,2])->first();
        } elseif ($search_gender === 1 && $user_gender === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [0,2])->first();
        }

		return $notSwipeUser;
    }
}
