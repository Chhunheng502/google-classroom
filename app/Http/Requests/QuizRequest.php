<?php

namespace App\Http\Requests;

use App\Rules\ArrayOrJson;
use App\Traits\ClassworkRequestPrep;
use App\Values\TaskSimilarRules;
use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
{
    use ClassworkRequestPrep;

    public function rules()
    {
        return collect(TaskSimilarRules::get())->merge([
                'url' => ['required']
            ]
        )->toArray();
    }
}
