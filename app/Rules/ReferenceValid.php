<?php

namespace App\Rules;

use App\Models\v1\Reference;
use Illuminate\Contracts\Validation\Rule;

class ReferenceValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Reference::find($value);
    }

    public function message()
    {
        return __('validation.reference_not_valid');
    }
}
