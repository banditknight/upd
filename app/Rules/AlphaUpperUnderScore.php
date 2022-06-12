<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaUpperUnderScore implements Rule
{
    public function passes($attribute, $value)
    {
        if (preg_match('/^[A-Z_]+$/', $value)) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return __('validation.rule_alpha_upper_underscore_not_valid');
    }
}
