<?php

namespace App\Rules;

use App\Models\v1\FinancialReport;
use Illuminate\Contracts\Validation\Rule;

class FinancialReportValid implements Rule
{
    public function passes($attribute, $value)
    {
        return FinancialReport::find($value);
    }

    public function message()
    {
        return __('valid.financial_report_not_valid');
    }
}
