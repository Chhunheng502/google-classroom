<?php

namespace App\Http\Requests;

use App\Traits\ClassworkRequestPrep;
use App\Values\TaskSimilarRules;
use Illuminate\Foundation\Http\FormRequest;

class SAQRequest extends FormRequest
{
    use ClassworkRequestPrep;
    
    public function rules()
    {
        return collect(TaskSimilarRules::get())->merge([
                'question' => ['required', 'max:255']
            ]
        )->toArray();
    }
}
