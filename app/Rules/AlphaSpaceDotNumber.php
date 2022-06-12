<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaSpaceDotNumber implements Rule
{
    public function passes($attribute, $value)
    {
        if (preg_match('/^[a-zA-Z0-9\s.]+$/', $value)) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return __('validation.rule_alpha_space_dot_not_valid');
    }
}
