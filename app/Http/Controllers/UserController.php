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
        $swipedUserIds = Swipe::where('from_user_id', $user->id)->get()->pluck('to_user_id');

        //swipeしていないuserを1つ取得,search_genderで切り分け
        //look for both $user=man
        if ($user['search_gender'] === 2 && $user['gender'] === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->whereIn('gender', [0,1])->whereIn('search_gender', [0, 2])->first();
        }
        //look for both $user=woman
        if ($user['search_gender'] === 2 && $user['gender'] === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->whereIn('gender', [0,1])->whereIn('search_gender', [1, 2])->first();
        }
        // if ($user['search_gender'] === 2 && $user['gender'] === 0) {
        //     $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [0, 2])->first();
        // } elseif ($user['search_gender'] === 2 && $user['gender'] === 0) {
        //     $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [0, 2])->first();
        // }

        // if ($user['search_gender'] === 2 && $user['gender'] === 1) {
        //     $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [1,2])->first();
        // } elseif ($user['search_gender'] === 2 && $user['gender'] === 1) {
        //     $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [1, 2])->first();
        // }

        //look for man man to man, man to woman
        if ($user['search_gender'] === 0 && $user['gender'] === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [0,2])->first();
        } elseif ($user['search_gender'] === 0 && $user['gender'] === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 0)->whereIn('search_gender', [1,2])->first();
        }
        //look for woman woman to woman, woman to man
        if ($user['search_gender'] === 1 && $user['gender'] === 1) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [1,2])->first();
        } elseif ($user['search_gender'] === 1 && $user['gender'] === 0) {
            $notSwipeUser = User::where('id', '<>', $user->id)->whereNotIn('id', $swipedUserIds)->where('gender', '=', 1)->whereIn('search_gender', [0,2])->first();
        }

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
            'search_gender' => ['required','integer','between:0, 2'],
            'search_status' => ['required','integer','between:0, 2'],
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

        //interventionImage
        // if (!is_null($imageFile) &&  $imageFile->isValid()) {
        //     $fileName = uniqid(rand() . '_');//randomなファイル名作成
        //     $extension = $imageFile->extension();
        //     $fileNameToStore = $fileName . '.' .  $extension;

        //     $resizedImage = InterventionImage::make($imageFile)->resize(350, 500)->encode();

        //     Storage::put('public/images/' . $fileNameToStore, $resizedImage);
        // }
    }

    public function destroy($id)
    {
        // dd('delete');
        User::find(\Auth::user()->id)->delete();

        return redirect()
        ->route('login')
        ->with(['flash_message' => 'Your account has been deleted.',
                'status' => 'alert'
        ]);
    }
}
