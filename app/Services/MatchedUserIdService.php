<?php

namespace App\Services;

use App\Models\User;
use App\Models\Swipe;

class MatchedUserIdService
{
	public static function matchedUserId($user_id)
	{
		$user = User::find(\Auth::user()->id);

		//自分とマッチした人のIDだけ取得
		//自分にlikeしてくれたuser ids
		$likedUserIds = Swipe::where('to_user_id', $user->id)
					->where('is_like', true)
					->pluck('from_user_id');

		//自分がマッチしたuserの情報のみを取得する
		$matchedUsers = Swipe::where('from_user_id', $user->id)
					->whereIn('to_user_id', $likedUserIds)
					->where('is_like', true)
					->get();

		//user_idが$matchedUserIdsの中に存在するかtrue false
		$matchedUserIds = [];
		foreach ($matchedUsers as $matchedUser) {
			$matchedUserIds[] = $matchedUser->to_user_id;
			$matchedUserId = in_array($user_id, $matchedUserIds);
		}

		//1人もmatchしていないuserが直接showにaccessしないように
		if (isset($matchedUserId)) {
			return $matchedUserId;
		}
	}
}
