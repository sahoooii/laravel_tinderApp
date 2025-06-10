<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Services\ImageService;
use App\Services\UserRegisterRulesService;

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

    protected function validator(array $data)
    {
        return Validator::make($data, UserRegisterRulesService::rules(), UserRegisterRulesService::messages());
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
        //img upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fullFilePath = ImageService::upload($request->file('image'), 'images');
        }

        $data = $request->all();

        return User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
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
    }
}
