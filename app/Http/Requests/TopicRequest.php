<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
        ];
    }
}
