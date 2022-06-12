<?php

namespace App\Rules;

use App\Models\v1\Education;
use Illuminate\Contracts\Validation\Rule;

class EducationValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Education::find($value);
    }

    public function message()
    {
        return __('validation.education_not_valid');
    }
}
