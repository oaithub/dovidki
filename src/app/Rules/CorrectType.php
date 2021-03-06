<?php

namespace App\Rules;

use App\Repositories\OrderTypeRepository;
use Illuminate\Contracts\Validation\Rule;

class CorrectType implements Rule
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
        return (new OrderTypeRepository())->getAllId()->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.correct-type');
    }
}
