<?php

namespace App\Traits;

trait ClassworkRequestPrep
{
    public function prepareForValidation()
    {
        if (is_array($this->attachments)) {
            $this->merge([
                'attachments' => collect($this->attachments)->toJson()
            ]);
        }

        if ($this->options && is_array($this->options)) {
            $this->merge([
                'options' => collect($this->options)->toJson()
            ]);
        }
    }
}