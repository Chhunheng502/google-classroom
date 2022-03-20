<?php

namespace App\Http\Requests;

use App\Rules\ArrayOrJson;
use App\Traits\ClassworkRequestPrep;
use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    use ClassworkRequestPrep;

    public function rules()
    {
        return [
            'classroom_id' => ['required', 'numeric'],
            'title' => ['required', 'max:255'],
            'description' => ['nullable'],
            'attachments' => ['nullable', new ArrayOrJson],
            'topic_id' => ['nullable', 'numeric']
        ];
    }
}
