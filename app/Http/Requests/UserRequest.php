<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2','max:30'],
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
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'age' => ['required','integer','between: 18,55'],
            'height' =>['required','numeric','between: 140,220'],
            'gender' => ['required', 'boolean'],
            'search_gender' => ['required'],
            'search_status' => ['required'],
            'occupation' => ['nullable', 'string','max:200'],
            'message' => ['nullable', 'max:3000']
        ];
    }

    public function  messages () {
        return [
            'image.mimes' => 'The image must be a file of type: jpeg,png, jpg.',
            'age.between' => 'You can join us from age 18 to 55.',
            'height.between' => 'Sorry, we have a height requirements 140cm to 220cm.',
            'search_gender.required' => 'Please select what you want to date.',
            'search_status.required' => 'Please select what you looking for.',
            'occupation.max' => 'Please input 200 characters or less.',
            'message.max' => 'Please input 3,000 characters or less.',
        ];
    }
}
