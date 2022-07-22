<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;
use App\Models\User;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        //保存
        Swipe::create([
            'from_user_id' => \Auth::user()->id,
            'to_user_id' => $request->input('to_user_id'),
            'is_like' => $request->input('is_like'),
        ]);

        //自分がlikeした人からlikeが来てたらmach
        $isMatch = $request->input('is_like') &&
                    Swipe::where('from_user_id', $request->input('to_user_id'))
                    ->where('to_user_id', \Auth::user()->id)
                    ->where('is_like', true)
                    ->exists();

        // $user = User::find(\Auth::user()->id);

        if ($isMatch) {
            return redirect(route('users.index'))
            ->with(['flash_message' => "You're matched!!",
                    'status' => 'info'
            ]);
        }

        return redirect(route('users.index'));
    }
}
