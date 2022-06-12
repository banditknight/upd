<?php

namespace App\Rules;

use App\Models\v1\District;
use Illuminate\Contracts\Validation\Rule;

class DistrictValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)District::find($value);
    }

    public function message()
    {
        return __('validation.district_not_valid');
    }
}
