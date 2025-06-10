<?php

namespace App\Services;

use App\Models\Swipe;

class MatchedUserIdService
{
    public static function getUserIdsWhoLikedMe($user)
    {
        //自分にlikeしてくれたuser idを取得
        $getUserIdsWhoLikedMe = Swipe::where('to_user_id', $user->id)
                    ->where('is_like', true)
                    ->pluck('from_user_id');

        return $getUserIdsWhoLikedMe;
    }

    // index マッチしたユーザーの一覧を表示with paginate
    public static function getMatchedUsers($user, $perPage = 5)
    {
        $userIdsWhoLikedMe = MatchedUserIdService::getUserIdsWhoLikedMe($user);

        return Swipe::where('from_user_id', $user->id)
            ->whereIn('to_user_id', $userIdsWhoLikedMe)
            ->where('is_like', true)
            ->with('toUser')
            ->paginate($perPage);
    }

    // Show matched user profile data
    public static function matchedUsers($user)
    {
        //自分がマッチしたuserの情報のみを取得する
        $matchedUsers = Swipe::where('from_user_id', $user->id)
                    ->whereIn('to_user_id', self::getUserIdsWhoLikedMe($user))
                    ->where('is_like', true)
                    ->get();

        return $matchedUsers;
    }

    public static function isMatchedUser($authUser, $targetUserId)
    {
        // マッチした相手のuser_id一覧だけ取得
        return self::matchedUsers($authUser)
                   ->pluck('to_user_id')
                   ->contains($targetUserId);
    }
}
