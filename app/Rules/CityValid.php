<?php

namespace App\Rules;

use App\Models\v1\City;
use Illuminate\Contracts\Validation\Rule;

class CityValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)City::find($value);
    }

    public function message()
    {
        return __('validation.city_not_valid');
    }
}
