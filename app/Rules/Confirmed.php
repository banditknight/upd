<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Confirmed implements Rule
{
    public function passes($attribute, $value)
    {
        $hasConfirm = request()->has(sprintf('confirm%s', ucfirst($attribute)));

        if (!$hasConfirm) {
            return false;
        }

        $getConfirmAttribute = request()->get(sprintf('confirm%s', ucfirst($attribute)));

        return $getConfirmAttribute === $value;
    }

    public function message()
    {
        return __('validation.rule_confirmed_not_valid');
    }
}
