<?php

namespace App\Http\Requests\v1\Board;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\BoardTypeNotValid;
use App\Rules\FileValid;
use App\Rules\NationalityValid;

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
            'boardTypeId' => [
                'required',
                'integer',
                new BoardTypeNotValid()
            ],
            'nationalityId' => [
                'required',
                'integer',
                new NationalityValid()
            ],
            'isListed' => [
                'required',
                'boolean'
            ],
            'isCompanyHead' => [
                'required',
                'boolean'
            ],
            'name' => [
                'required',
                'min:3',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'position' => [
                'required',
                'min:2',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'taxIdentificationNumber' => [
                'required',
                'numeric',
                'digits_between:15,16',
                'unique:boards,taxIdentificationNumber'
            ],
            'taxIdentificationAttachment' => [
                'required',
                new FileValid()
            ],
            'ktpNumber' => [
                'required_if:nationalityId,1',
                'numeric',
                'digits_between:15,16',
                'unique:boards,ktpNumber'
            ],
            'ktpAttachment' => [
                'required',
                new FileValid()
            ],
            'kitasNumber' => [
                'exclude_if:nationalityId,1',
                'digits_between:10,16',
                'unique:boards,kitasNumber'
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
