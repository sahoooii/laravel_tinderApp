<?php

namespace App\Services;

use App\Models\Swipe;

class SwipeService
{
    public static function storeSwipe($fromUserId, $toUserId, $isLike)
    {
        Swipe::create([
            'from_user_id' => $fromUserId,
            'to_user_id' => $toUserId,
            'is_like' => $isLike,
        ]);

        if (!$isLike) {
            return false;
        }

        return Swipe::where('from_user_id', $toUserId)
                    ->where('to_user_id', $fromUserId)
                    ->where('is_like', true)
                    ->exists();
    }
}
