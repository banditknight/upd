<?php

namespace App\Http\Requests\v1\ShareHolder;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\FileValid;
use App\Rules\NationalityValid;

class UpdateRequest extends \App\Http\Requests\AbstractRequest
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
            'name' => [
                'required',
                'min:3',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'nationalityId' => [
                'required',
                'integer',
                new NationalityValid()
            ],
            'sharePercentage' => [
                'required',
                'integer',
                'min:1',
                'max:90'
            ],
            'taxIdentificationNumber' => [
                'required',
                'numeric',
                'digits_between:15,16',
                sprintf('unique:shareHolders,taxIdentificationNumber,%s', $this->modelId())
            ],
            'taxIdentificationAttachment' => [
                new FileValid()
            ],
            'ktpNumber' => [
                'exclude_if:nationalityId,2',
                'nullable',
                'numeric',
                'digits_between:15,16',
                sprintf('unique:shareHolders,ktpNumber,%s', $this->modelId())
            ],
            'ktpAttachment' => [
                'exclude_if:nationalityId,2',
                new FileValid()
            ],
            'kitasNumber' => [
                'exclude_if:nationalityId,1',
                'nullable',
                'numeric',
                'digits_between:10,16',
                sprintf('unique:shareHolders,kitasNumber,%s', $this->modelId())
            ],
            'kitasAttachment' => [
                'exclude_if:nationalityId,1',
                new FileValid()
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
