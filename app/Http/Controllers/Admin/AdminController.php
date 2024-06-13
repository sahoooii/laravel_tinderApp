<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Swipe;
use App\Services\MatchedUserInfoService;
use App\Services\MatchedUserIdService;

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
        // dd(Auth::guard('web')->user());
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
        $admin = Admin::find(\Auth::user()->id);

        //パラメータのidを取得,存在しないuser_idはredirect
        if (is_null(User::find($id))) {
            return redirect()
            ->route('admin.index');
        } else {
            $user = User::where('id', $id)->first();
        }

        //gender, search_status表記
        $gender = MatchedUserInfoService::userGender($user->gender);
        $search_status = MatchedUserInfoService::userSearchStatus($user->search_status);

        $likedUserIds = MatchedUserIdService::likedUserIds($user);
        $matchedUsers = MatchedUserIdService::matchedUsers($user);

        $countLikedUsers = count($likedUserIds);
        $countMatchedUsers = count($matchedUsers);

        return view('admin.show', compact('admin', 'user', 'gender', 'search_status', 'countLikedUsers', 'countMatchedUsers'));
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
