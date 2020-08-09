<?php

namespace App\Rules;

use Auth;
use Illuminate\Contracts\Validation\Rule;

class CorrectGroup implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Auth::user()->groups()->keys()->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.correct-group');
    }
}
