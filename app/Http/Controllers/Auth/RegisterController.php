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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //追記
            'age' => 'required|integer|between: 18,55',
            'height' => 'required|numeric|between: 140,220',
            'gender' => 'required|boolean',
            'occupation' => 'nullable|string|max:200',
            'message' => 'nullable|max:3000'
        ]);
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
        ->with('flash_message', 'Welcome to Tinder!!');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param .. Request $request
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        //img upload
        // dd($request->all());
        $fileName = $request->file('image')->getClientOriginalName();//file名取得
        Storage::putFileAs('public/images', $request->file('image'), $fileName);
        $fullFilePath = '/storage/images/' . $fileName;

        $data = $request->all();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'img_url' => $fullFilePath,
            'age' => $data['age'],
            'height' => $data['height'],
            'gender' => $data['gender'], //追記
            'occupation' => $data['occupation'],
            'message' => $data['message'],
        ]);
    }
}
