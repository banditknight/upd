<?php

namespace App\Rules;

use App\Models\v1\BusinessPermitType;
use Illuminate\Contracts\Validation\Rule;

class BusinessPermitTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)BusinessPermitType::find($value);
    }

    public function message()
    {
        return __('validation.business_permit_type_not_valid');
    }
}
