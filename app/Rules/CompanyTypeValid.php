<?php

namespace App\Rules;

use App\Models\v1\CompanyType;
use Illuminate\Contracts\Validation\Rule;

class CompanyTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)CompanyType::find($value);
    }

    public function message()
    {
        return __('validation.company_type_not_valid');
    }
}
