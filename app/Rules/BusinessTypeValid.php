<?php

namespace App\Rules;

use App\Models\v1\BusinessType;
use Illuminate\Contracts\Validation\Rule;

class BusinessTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return BusinessType::find($value);
    }

    public function message()
    {
        return __('validation.business_type_not_valid');
    }
}
