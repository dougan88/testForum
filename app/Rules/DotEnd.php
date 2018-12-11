<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DotEnd implements Rule
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
        $value = trim($value);
        return substr($value, strlen($value) - 1, 1) === '.';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This string should contain "." at the end.';
    }
}
