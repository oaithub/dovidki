<?php

namespace App\Rules;

use App\Repositories\OrderStateRepository;
use Illuminate\Contracts\Validation\Rule;

class CorrectState implements Rule
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
        return (new OrderStateRepository())->getAllId()->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.custom.correct-state');
    }
}
