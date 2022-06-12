<?php

namespace App\Rules;

use App\Models\v1\CertificationType;
use Illuminate\Contracts\Validation\Rule;

class CertificationTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)CertificationType::find($value);
    }

    public function message()
    {
        return __('validation.certification_type_not_valid');
    }
}
