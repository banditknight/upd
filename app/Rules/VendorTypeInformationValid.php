<?php

namespace App\Rules;

use App\Models\v1\VendorTypeInformation;
use Illuminate\Contracts\Validation\Rule;

class VendorTypeInformationValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)VendorTypeInformation::find($value);
    }

    public function message()
    {
        return __('validation.vendor_type_information_not_valid');
    }
}
