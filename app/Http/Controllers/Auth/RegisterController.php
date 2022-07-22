<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $user
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected $messages = [
        'image.mimes' => 'The image must be a file of type: jpeg,png, jpg.',
        'age.between' => 'You can join us from age 18 to 55.',
        'height.between' => 'Sorry, we have a height requirements 140cm to 220cm.',
        'search_gender.required' => 'Please select what you want to date.',
        'search_status.required' => 'Please select what you looking for.',
        'occupation.max' => 'Please input 200 characters or less.',
        'message.max' => 'Please input 3,000 characters or less.',
    ];

    protected $rules = [
        'name' => ['required', 'string','min:4','max:50'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'image' => ['required','image', 'mimes:png,jpg,jpeg', 'max:2048'],
        'age' => ['required','integer','between: 18,55'],
        'height' =>['required','numeric','between: 140,220'],
        'gender' => ['required', 'boolean'],
        'search_gender' => ['required'],
        'search_status' => ['required'],
        'occupation' => ['nullable', 'string','max:200'],
        'message' => ['nullable', 'max:3000']
    ];

    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules, $this->messages);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        // return $request->wantsJson()
        //             ? new JsonResponse([], 201)
        //             : redirect($this->redirectPath());
        return redirect()
        ->route('users.index')
        ->with(['flash_message' => 'Welcome to Tinder!!',
                'status' => 'info']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param .. Request $request
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        // dd($request->all());

        //img upload
        $imageFile = $request->file('image');//file取得

        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fullFilePath = ImageService::upload($imageFile, 'images');
        }


        $data = $request->all();
        // dd( $fullFilePath);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'img_url' =>  $fullFilePath,
            'age' => $data['age'],
            'height' => $data['height'],
            'gender' => $data['gender'],
            'search_gender' => $data['search_gender'],
            'search_status' => $data['search_status'],
            'occupation' => $data['occupation'],
            'message' => $data['message'],
        ]);



        // $imageFile = $request->file('image')->getClientOriginalName();//file名取得
        // Storage::putFileAs('public/images', $request->file('image'), $imageFile);
        // $fullFilePath = '/storage/images/' . $imageFile;

        //InterventionImage
        // $file = $request->file('image');//file名取得
        // $fileName = uniqid(rand() . '_');//randomなファイル名作成
        // $extension = $file->extension();
        // $fileNameToStore = $fileName . '.' .  $extension;

        // $resizedImage = InterventionImage::make($file)->resize(335, 400)->encode();

        // Storage::put('public/images/' . $fileNameToStore, $resizedImage);

        // dd($file, $resizedImage);
    }
}
