<?php

namespace App\Services;

use App\Models\User;
use App\Models\Swipe;

class MatchedUserIdService
{
    public static function likedUserIds($user)
    {
        //自分にlikeしてくれたuser idを取得
        $likedUserIds = Swipe::where('to_user_id', $user->id)
                    ->where('is_like', true)
                    ->pluck('from_user_id');

        return $likedUserIds;
    }

    public static function matchedUsers($user)
    {
        //自分がマッチしたuserの情報のみを取得する
        $matchedUsers = Swipe::where('from_user_id', $user->id)
                    ->whereIn('to_user_id', self::likedUserIds($user))
                    ->where('is_like', true)
                    ->get();

        return $matchedUsers;
    }

    public static function matchedUserId($user_id)
    {
        $user = User::find(\Auth::user()->id);

        $matchedUsers = self::matchedUsers($user);

        //user_idが$matchedUserIdsの中に存在するかtrue false
        $matchedUserIds = [];
        foreach ($matchedUsers as $matchedUser) {
            $matchedUserIds[] = $matchedUser->to_user_id;
            $matchedUserId = in_array($user_id, $matchedUserIds);
        }

        //matchしていないuserIDを直接打ってaccessできないように制御
        if (isset($matchedUserId)) {
            return $matchedUserId;
        }
    }
}
