<?php

namespace App\Rules;

use App\Models\v1\EmployeeStatus;
use Illuminate\Contracts\Validation\Rule;

class EmployeeStatusValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)EmployeeStatus::find($value);
    }

    public function message()
    {
        return __('validation.employee_status_not_valid');
    }
}
