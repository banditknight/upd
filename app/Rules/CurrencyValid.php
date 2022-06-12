<?php

namespace App\Rules;

use App\Models\v1\Currency;
use Illuminate\Contracts\Validation\Rule;

class CurrencyValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Currency::find($value);

    }

    public function message()
    {
        return __('validation.currency_not_valid');
    }
}
