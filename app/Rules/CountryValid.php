<?php

namespace App\Rules;

use App\Models\v1\Country;
use Illuminate\Contracts\Validation\Rule;

class CountryValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Country::find($value);
    }

    public function message()
    {
        return __('validation.country_not_valid');
    }
}
