<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'role' => ['required', Rule::in(['teacher', 'student'])],
            'classroom_id' => ['required', 'numeric']
        ];
    }
}
