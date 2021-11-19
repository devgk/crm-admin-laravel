<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameText implements Rule
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
        // Check for valid Alphabets Numbers and Texts
        return preg_match('/(^[A-Za-z0-9 _-]+$)+/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Name only accepts alpha numeric characters including dash and underscore.';
    }
}
