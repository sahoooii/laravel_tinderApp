<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SwipeRequest;
use App\Services\SwipeService;

class SwipeController extends Controller
{
    public function store(SwipeRequest $request)
    {
        $userId = \Auth::id();

        //自分がlikeした人からlikeが来てたらmatch
        $isMatch = SwipeService::storeSwipe($userId, $request->input('to_user_id'), $request->input('is_like'));

        $redirect = redirect(route('users.index'));

        if ($isMatch) {
            $redirect->with([
                      'flash_message' => "You're 	matched!!",
                        'status' => 'info'
                    ]);
        }

        return $redirect;
    }
}
