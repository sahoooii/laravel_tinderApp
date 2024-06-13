<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Swipe;
use App\Services\MatchedUserIdService;
use App\Services\MatchedUserInfoService;

class MatchController extends Controller
{
    public function index()
    {
        $user = User::find(\Auth::user()->id);

        $likedUserIds = MatchedUserIdService::likedUserIds($user);

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

        //パラメータのidを取得,存在しないuser_idはredirect
        if (is_null(User::find($id))) {
            return redirect()
            ->route('matches.index');
        } else {
            $user_id = User::find($id)->id;
        }

        $matchedUserId = MatchedUserIdService::matchedUserId($user_id);

        //$matchedUserIdがtrueならuser情報を取得,falseならredirect
        if ($matchedUserId) {
            $matchedUserInfo =  User::find($id);
        } else {
            return redirect()
            ->route('matches.index')
            ->with(['flash_message' => 'You can only see your matched user.',
                'status' => 'alert'
            ]);
        }

        //gender表記
        $gender = MatchedUserInfoService::userGender($matchedUserInfo->gender);
        // //search_status表記
        $search_status = MatchedUserInfoService::userSearchStatus($matchedUserInfo->search_status);

        return view('pages.match.show', compact('user', 'matchedUserInfo', 'gender', 'search_status'));
    }

    public function destroy($id)
    {
        Swipe::where('to_user_id', $id)->delete();

        return redirect()
        ->route('matches.index')
        ->with(['flash_message' => 'Remove from your matching list',
            'status' => 'alert'
        ]);
    }

}
