<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\ImageService;
use App\Services\SearchGenderService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //Loginしているuser情報
        $user = Auth::user();

        $notSwipeUser = SearchGenderService::searchGender($user['search_gender'], $user['gender']);

        return view('pages.user.index', compact('notSwipeUser', 'user'));
    }

    public function edit($id)
    {
        $user = Auth::user();

        return view('pages.user.edit', compact('user'));
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();

        // 画像アップロード
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->img_url = ImageService::upload($request->file('image'), 'images');
        }

        // パスワードが入力されていた場合のみ更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // 一括代入
        $user->fill($request->only([
            'name', 'email', 'age', 'height', 'gender',
            'search_gender', 'search_status', 'occupation', 'message'
                    ]));

        $user->save();

        return redirect()
        ->route('users.index')
        ->with(['flash_message' => 'Updated your profile!',
                'status' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $user = Auth::user();

        User::find($user->id)->delete();

        return redirect()
        ->route('login')
        ->with(['flash_message' => 'Your account has been deleted.',
            'status' => 'alert'
        ]);
    }
}
