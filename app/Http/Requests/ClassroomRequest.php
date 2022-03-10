<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ClassroomRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if ($this->isMethod('post')) {
            $this->merge([
                'code' => Str::random(7),
            ]);
        }
    }
    
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'section' => ['max:255'],
            'room' => ['max:255'],
            'subject' => ['max:255']
        ];
    }
}
