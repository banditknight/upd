<?php

namespace App\Http\Requests\v1\Deed;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\DeedTypeNotValid;

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
            'deedTypeId' => [
                'required',
                new DeedTypeNotValid()
            ],
            'number' => [
                'required',
                'min:10',
                'max:255'
            ],
            'issuedDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'notaryFullName' => [
                'required',
                'min:3',
                'max:100',
                // new AlphaSpaceDotComma(),
            ],
            'ackLetterNumber' => [
                'required',
                'min:10',
                'max:255'
            ],
            'ackLetterDate' => [
                'required',
                'date_format:d-m-Y'
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
