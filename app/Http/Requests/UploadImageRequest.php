<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    // public function message()
    // {
    //     return [
    //         'image' => 'This file is not an image.',
    //         'mines' => "This file's extension is not jpg or jpeg or png.",
    //         'max' => 'This file is too big. Please upload up to 2MB in size.',
    //     ];
    // }
}
