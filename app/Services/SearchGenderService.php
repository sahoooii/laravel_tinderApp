<?php

namespace App\Services;

use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\Auth;

class SearchGenderService
{
    public static function searchGender($searchGender, $userGender)
    {
        //Loginしているuser情報
        $authUser = Auth::user();

        // $authUserがswipeしたuserIdのみを配列で取得
        $swipedUserIds = Swipe::where('from_user_id', $authUser->id)
        ->pluck('to_user_id');

        // 相手の性別
        $genderFilter = [];
        // 相手が自分を対象としてるかどうか
        $searchGenderFilter = [];

        // 性別の絞り込み条件
        // man=0 woman=1 both=2
        if ($searchGender === 2) {
            $genderFilter = [0, 1];
            $searchGenderFilter = $userGender === 0 ? [0, 2] : [1, 2];
        } elseif ($searchGender === 0) {
            $genderFilter = [0];
            $searchGenderFilter = $userGender === 0 ? [0, 2] : [1, 2];
        } elseif ($searchGender === 1) {
            $genderFilter = [1];
            $searchGenderFilter = $userGender === 1 ? [1, 2] : [0, 2];
        }

        // 自分自身は検索結果から除外、既にスワイプしたユーザーを表示しない、自分が求めている相手の性別、相手が自分の性別を受け入れてるか
        return User::where('id', '<>', $authUser->id)
           ->whereNotIn('id', $swipedUserIds)
           ->whereIn('gender', $genderFilter)
           ->whereIn('search_gender', $searchGenderFilter)
          //  ->inRandomOrder()
           ->first();
    }
}
