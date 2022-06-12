<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ChainLocationRequestValid implements Rule
{
    public function passes($attribute, $value)
    {
        return true;
    }

    public function message()
    {
        return [];
    }
}
