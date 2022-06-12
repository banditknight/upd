<?php

namespace App\Http\Requests\v1\Board;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\BoardTypeNotValid;
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
                sprintf('unique:boards,taxIdentificationNumber,%s', $this->modelId())
            ],
            'taxIdentificationAttachment' => [
                new FileValid()
            ],
            'ktpNumber' => [
                'required_if:nationalityId,1',
                'numeric',
                'digits_between:15,16',
                sprintf('unique:boards,ktpNumber,%s', $this->modelId())
            ],
            'ktpAttachment' => [
                new FileValid()
            ],
            'kitasNumber' => [
                'exclude_if:nationalityId,1',
                'required',
                'digits_between:10,16',
                sprintf('unique:boards,kitasNumber,%s', $this->modelId())
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
