<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;
use App\Services\SearchGenderService;
use App\Http\Requests\UserRequest;
use InterventionImage;

class UserController extends Controller
{
    public function index()
    {
        //loginしているuser情報
        $user = User::find(\Auth::user()->id);

        $notSwipeUser = SearchGenderService::searchGender($user['search_gender'], $user['gender']);

        return view('pages.user.index', compact('notSwipeUser', 'user'));
    }

    public function edit($id)
    {
        $user = User::find(\Auth::user()->id);

        return view('pages.user.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        //imgをuploadしなくてもerrorにならないように
        $imageFile = $request->file('image');//file取得
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fullFilePath = ImageService::upload($imageFile, 'images');
        }

        $user = User::find(\Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $user->img_url = $fullFilePath;
        }
        $user->age = $request->input('age');
        $user->height = $request->input('height');
        $user->gender = $request->input('gender');
        $user->search_gender = $request->input('search_gender');
        $user->search_status = $request->input('search_status');
        $user->occupation = $request->input('occupation');
        $user->message = $request->input('message');

        $user->save();

        return redirect()
        ->route('users.index')
        ->with(['flash_message' => 'Updated your profile!',
                'status' => 'info'
        ]);
    }

    public function destroy($id)
    {
        User::find(\Auth::user()->id)->delete();

        return redirect()
        ->route('login')
        ->with(['flash_message' => 'Your account has been deleted.',
            'status' => 'alert'
        ]);
    }
}
