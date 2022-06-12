<?php

namespace App\Rules;

use App\Models\v1\WorkPeriod;
use Illuminate\Contracts\Validation\Rule;

class WorkPeriodValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)WorkPeriod::find($value);
    }

    public function message()
    {
        return __('validation.work_period_not_valid');
    }
}
