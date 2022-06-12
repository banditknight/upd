<?php

namespace App\Rules;

use App\Models\v1\DeedType;
use Illuminate\Contracts\Validation\Rule;

class DeedTypeNotValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)DeedType::find($value);
    }

    public function message()
    {
        return __('validation.deed_type_not_valid');
    }
}
