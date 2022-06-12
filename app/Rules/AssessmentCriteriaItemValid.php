<?php

namespace App\Rules;

use App\Models\v1\AssessmentCriteriaItem;
use Illuminate\Contracts\Validation\Rule;

class AssessmentCriteriaItemValid implements Rule
{
    public function passes($attribute, $value)
    {
        return AssessmentCriteriaItem::find($value);
    }

    public function message()
    {
        return __('validation.rule_assessment_criteria_item_not_valid');
    }
}
