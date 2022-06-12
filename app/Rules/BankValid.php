<?php

namespace App\Rules;

use App\Models\v1\Bank;
use Illuminate\Contracts\Validation\Rule;

class BankValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)Bank::find($value);
    }

    public function message()
    {
        return __('validation.bank_not_valid');
    }
}
