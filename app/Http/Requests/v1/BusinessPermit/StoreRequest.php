<?php

namespace App\Http\Requests\v1\BusinessPermit;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\BusinessPermitTypeValid;
use App\Rules\FileValid;

class StoreRequest extends \App\Http\Requests\AbstractRequest
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
            'businessPermitTypeId' => [
                'required',
                new BusinessPermitTypeValid()
            ],
            'attachment' => [
                'required',
                new FileValid()
            ],
            'legalOrganizationScaleId' => [
                'required_if:businessPermitTypeId,3',
                'nullable',
                'numeric'
            ],
            'number' => [
                'required',
                'min:8',
                'max:16',
                'unique:businessPermits,number'
            ],
            'validFromDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'validThruDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'issuedBy' => [
                'required',
                'min:8',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'otherBusinessPermitType' => [
                'required_if:businessPermitTypeId,8',
                'nullable',
                'min:10',
                'max:256',
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
