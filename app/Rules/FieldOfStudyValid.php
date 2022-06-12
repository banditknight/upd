<?php

namespace App\Rules;

use App\Models\v1\FieldOfStudy;
use Illuminate\Contracts\Validation\Rule;

class FieldOfStudyValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)FieldOfStudy::find($value);
    }

    public function message()
    {
        return __('validation.field_of_study_not_valid');
    }
}
