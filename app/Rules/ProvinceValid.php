<?php

namespace App\Rules;

use App\Models\v1\Province;
use Illuminate\Contracts\Validation\Rule;

class ProvinceValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Province::find($value);
    }

    public function message()
    {
        return __('validation.province_not_valid');
    }
}
