<?php

namespace App\Values;

use App\Rules\ArrayOrJson;

// SUGGESTION [should we add final key to make it unmutable?]
class TaskSimilarRules
{
    public static function get()
    {
        return [
            'classroom_id' => ['required', 'numeric'],
            'title' => ['required', 'max:255'],
            'description' => ['nullable'],
            'attachments' => ['nullable', new ArrayOrJson],
            'points' => ['nullable', 'integer', 'between:1,100'],
            'due_date' => ['nullable', 'date', 'after:now'],
            'topic_id' => ['nullable', 'numeric']
        ];
    }
}