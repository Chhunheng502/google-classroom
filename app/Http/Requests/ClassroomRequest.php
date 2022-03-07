<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'section' => ['max:255'],
            'room' => ['max:255'],
            'subject' => ['max:255']
        ];
    }
}
