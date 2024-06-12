<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Swipe;
use App\Services\MatchedUserInfoService;

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
        // dd($user);
        $allUsers = User::select('id', 'name', 'img_url')
        ->paginate(6);
        // dd($allUsers);

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

        $user = User::where('id', $id)->first();

        //gender表記
        $gender = MatchedUserInfoService::userGender($user->gender);
        // //search_status表記
        $search_status = MatchedUserInfoService::userSearchStatus($user->search_status);

        $likedUserIds = Swipe::where('to_user_id', $user->id)
        ->where('is_like', true)
        ->pluck('from_user_id');

				$countLikedUsers = count($likedUserIds);
        // dd($countLikedUsers);

        return view('admin.show', compact('admin', 'user', 'gender', 'search_status', 'countLikedUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
