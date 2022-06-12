<?php

namespace App\Http\Requests\v1\ShareHolder;

use App\Http\Requests\ResourceRequest;
use App\Rules\AlphaSpaceDotComma;
use App\Rules\FileValid;
use App\Rules\NationalityValid;

class StoreRequest extends ResourceRequest
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
                'unique:shareHolders,taxIdentificationNumber'
            ],
            'taxIdentificationAttachment' => [
                'required',
                new FileValid()
            ],
            'ktpNumber' => [
                'exclude_if:nationalityId,2',
                'nullable',
                'numeric',
                'digits_between:15,16',
                'unique:shareHolders,ktpNumber'
            ],
            'ktpAttachment' => [
                'exclude_if:nationalityId,2',
                'nullable',
                new FileValid()
            ],
            'kitasNumber' => [
                'exclude_if:nationalityId,1',
                'nullable',
                'numeric',
                'digits_between:10,16',
                'unique:shareHolders,kitasNumber'
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
