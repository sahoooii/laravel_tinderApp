<?php

namespace App\Services;

class UserRegisterRulesService
{
    public static function messages()
    {
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

    public static function rules()
    {
		return [
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
    }
}
