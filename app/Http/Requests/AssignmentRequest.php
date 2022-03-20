<?php

namespace App\Http\Requests;

use App\Traits\ClassworkRequestPrep;
use App\Values\TaskSimilarRules;
use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
{
    use ClassworkRequestPrep;

    public function rules()
    {
        return TaskSimilarRules::get();
    }
}
