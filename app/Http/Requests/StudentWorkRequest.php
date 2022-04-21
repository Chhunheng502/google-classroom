<?php

namespace App\Http\Requests;

use App\Rules\ArrayOrJson;
use Illuminate\Foundation\Http\FormRequest;

class StudentWorkRequest extends FormRequest
{
    // SUGGESTION [you can use casting at database level instead]
    public function prepareForValidation()
    {
        if (is_array($this->answers)) {
            $this->merge([
                'answers' => collect($this->answers)->toJson()
            ]);
        }
    }
    
    public function rules()
    {
        return [
            'task_id' => ['required', 'numeric'],
            'task_type' => ['required'],
            'answers' => [new ArrayOrJson]
        ];
    }
}
