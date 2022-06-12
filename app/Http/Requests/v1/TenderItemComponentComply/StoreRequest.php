<?php

namespace App\Http\Requests\v1\TenderItemComponentComply;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AssessmentCriteriaItemValid;
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
            'assessmentCriteriaItemId' => [
                'required',
                'numeric',
                new AssessmentCriteriaItemValid()
            ],
            'isComply' => [
                'required',
                'boolean'
            ],
            'comment' => [
                'nullable',
                'required_if:isComply,false',
                new AlphaSpaceDotComma()
            ]
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
