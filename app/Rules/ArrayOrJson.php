<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use function PHPUnit\Framework\isJson;

class ArrayOrJson implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return is_array($value) || isJson($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Type must be either array or json.';
    }
}
