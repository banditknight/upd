<?php

namespace App\Rules;

use App\Models\v1\VendorTypeInformation;
use Illuminate\Contracts\Validation\Rule;

class VendorTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return VendorTypeInformation::find($value);
    }

    public function message()
    {
        return __('validation.vendor_type_not_valid');
    }
}
