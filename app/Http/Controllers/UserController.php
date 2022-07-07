<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Swipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
use App\Http\Requests\UploadImageRequest;

class UserController extends Controller
{
    public function index()
    {
        //loginしているuser情報
        $user = User::find(\Auth::user()->id);

        //すでにswipeしたuserを省いて、idsを取得
        $swipedUserIds = Swipe::where('from_user_id', \Auth::user()->id)->get()->pluck('to_user_id');
        //swipeしていないuserを1つ取得
        $notSwipeUser = User::where('id', '<>', \Auth::user()->id)->whereNotIn('id', $swipedUserIds)->first();

        return view('pages.user.index', compact('notSwipeUser', 'user'));
    }

    // public function show($id)
    // {
    //     $user = User::find(\Auth::user()->id);
    //     // dd($user);

    //     return view('pages.user.show', compact('user'));
    // }

    public function edit($id)
    {
        $user = User::find(\Auth::user()->id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(UploadImageRequest $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4','max:50'],
            'email' => ['required', 'email', function ($name, $item, $fail) {
                // もし既に使用されているemailなら弾く
                if (count(User::where([
                        ['email', $item],
                        ['id', '<>',\Auth::user()->id]
                    ])->get())) {
                    $fail('This email address is already in use.');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required','integer','between: 18,55'],
            'height' =>['required','numeric','between: 140,220'],
            'gender' => ['required', 'boolean'],
            'occupation' => ['nullable', 'string','max:200'],
            'message' => ['nullable', 'max:3000']
        ]);

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
        $user->occupation = $request->input('occupation');
        $user->message = $request->input('message');

        $user->save();

        return redirect()
        ->route('users.index')
        ->with('flash_message', 'Updated your profile!');

        //interventionImage
        // if (!is_null($imageFile) &&  $imageFile->isValid()) {
        //     $fileName = uniqid(rand() . '_');//randomなファイル名作成
        //     $extension = $imageFile->extension();
        //     $fileNameToStore = $fileName . '.' .  $extension;

        // $resizedImage = InterventionImage::make($imageFile)->resize(335, 400)->encode();

        // Storage::put('public/images/' . $fileNameToStore, $resizedImage);
        // }
    }
}
