<?php

namespace App\Rules;

use App\Models\v1\AssessmentCriteria;
use Illuminate\Contracts\Validation\Rule;

class AssessmentCriteriaValid implements Rule
{
    public function passes($attribute, $value)
    {
        $assessmentCriteria = AssessmentCriteria::find($value);

        if (!$assessmentCriteria) {
            return false;
        }

        $tenderId = $assessmentCriteria->tenderId;
        $tenderItemId = $assessmentCriteria->tenderItemId;
        $request = request();

        return !($tenderId !== $request->request->get('tenderId') || $tenderItemId !== $request->request->get('tenderItemId'));
    }

    public function message()
    {
        return __('validation.rule_assessment_criteria_valid');
    }
}
