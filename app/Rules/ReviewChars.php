<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReviewChars implements Rule
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
        return strlen(strip_tags($value)) <= 140;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute mag niet meer dan 140 karakters bevatten.';
    }
}
