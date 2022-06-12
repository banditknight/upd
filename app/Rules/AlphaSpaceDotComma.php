<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaSpaceDotComma implements Rule
{
    public function passes($attribute, $value)
    {
        if (preg_match('/^[a-zA-Z\s.,]+$/', $value)) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return __('validation.rule_alpha_space_dot_comma_not_valid');
    }
}
