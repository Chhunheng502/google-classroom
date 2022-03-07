<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'theme_path' => ['max:5000', 'mimes:jpeg,jpg,png,svg']
        ];
    }
}
