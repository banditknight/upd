<?php

namespace App\Http\Requests\v1\TenderTechnicalBidEvaluation;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaUnderScore;
use App\Rules\AlphaUpperUnderScore;
use App\Rules\AssessmentCriteriaValid;
use Pearl\RequestValidate\RequestAbstract;

class StoreRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tenderId' => [
                'required'
            ],
            'tenderItemId' => [
                'required'
            ],
            'assessmentCriteriaId' => [
                'required',
                new AssessmentCriteriaValid()
            ],
            'assessmentCriteriaItem.*' => [
                'required'
            ],
            'assessmentCriteriaItem.*.name' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            'assessmentCriteriaItem.*.code' => [
                'required',
                'string'
            ],
            'assessmentCriteriaItem.*.description' => [
                'nullable',
                'string'
            ],
            'assessmentCriteriaItem.*.point' => [
                'required',
                'numeric'
            ],
            'assessmentCriteriaItem.*.isSummary' => [
                'boolean'
            ],
            'requirement' => [
                'required'
            ],
            'weight' => [
                'required',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
