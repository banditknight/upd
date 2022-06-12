<?php

namespace App\Rules;

use App\Models\v1\Domain;
use Illuminate\Contracts\Validation\Rule;

class DomainValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Domain::find($value);
    }

    public function message()
    {
        return __('validation.domain_not_valid');
    }
}
