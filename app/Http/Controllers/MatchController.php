<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Swipe;
use App\Services\MatchedUserIdService;
use App\Services\MatchedUserInfoService;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $matchedUsers = MatchedUserIdService::getMatchedUsers($user);

        return view('pages.match.index', compact('user', 'matchedUsers'));
    }

    public function show($id)
    {
        $authUser = Auth::user();
        $userToShow = User::find($id);

				//パラメータのidを取得,存在しないuser_idはredirect
        if (is_null($userToShow)) {
            return redirect()
            ->route('matches.index');
        }
        // $id=targetUserId
        if (!MatchedUserIdService::isMatchedUser($authUser, $id)) {
            return redirect()->route('matches.index')->with([
                    'flash_message' => 'You can only see your matched user.',
                    'status' => 'alert'
            ]);
        }

        //gender, search_status表記
        $gender = MatchedUserInfoService::userGender($userToShow->gender);
        $search_status = MatchedUserInfoService::userSearchStatus($userToShow->search_status);

        return view('pages.match.show', compact('authUser', 'userToShow', 'gender', 'search_status'));
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
