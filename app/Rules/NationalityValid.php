<?php

namespace App\Rules;

use App\Models\v1\Nationality;
use Illuminate\Contracts\Validation\Rule;

class NationalityValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Nationality::find($value);
    }

    public function message()
    {
        return __('validation.nationality_not_valid');
    }
}
