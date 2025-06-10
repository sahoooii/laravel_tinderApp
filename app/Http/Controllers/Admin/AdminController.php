<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Services\MatchedUserInfoService;
use App\Services\MatchedUserIdService;
use \Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find(\Auth::user()->id);

        $allUsers = User::select('id', 'name', 'img_url')
        ->paginate(6);

        return view('admin.index', compact('admin', 'allUsers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Auth::guard('admin')->user();

        //パラメータのidを取得,存在しないuser_idはredirect
        $user = User::find($id);

        if (is_null($user)) {
            return redirect()
            ->route('admin.index')
            ->with(['flash_message' => 'This user is no longer exist',
            'status' => 'alert'
            ]);
        }

        //gender, search_status表記
        $gender = MatchedUserInfoService::userGender($user->gender ?? 'unknown');
        $search_status = MatchedUserInfoService::userSearchStatus($user->search_status ?? 'unknown');

				//Get ID who give me likes
        $getUserIdsWhoLikedMeIds = MatchedUserIdService::getUserIdsWhoLikedMe($user);
				// Actual Match
        $matchedUsers = MatchedUserIdService::matchedUsers($user);

        return view('admin.show', [
            'admin' => $admin,
            'user' => $user,
            'gender' => $gender,
            'search_status' => $search_status,
            'countLikedUsers' => count($getUserIdsWhoLikedMeIds),
            'countMatchedUsers' => count($matchedUsers),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()
                ->route('admin.index')
                ->with(['flash_message' => 'Delete from users list',
                'status' => 'alert'
        ]);
    }
}
