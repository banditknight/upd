<?php

namespace App\Http\Requests\v1\Tool;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\FileValid;
use App\Rules\ToolOwnerTypeNotValid;
use App\Rules\ToolTypeValid;

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
            'total' => [
                'required',
                'numeric',
                'max:20000000000'
            ],
            'description' => [
                'required',
                'min:5',
                'max:256',
                new AlphaSpaceDotComma()
            ],
            'capacity' => [
                'required',
                'numeric',
                'max:20000000000'
            ],
            'brand' => [
                'required',
                'min:3',
                'max:256',
                new AlphaSpaceDotComma()
            ],
            'isNew' => [
                'required',
                'boolean',
            ],
            'location' => [
                'required',
                'min:10',
                'max:256',
                new AlphaSpaceDotNumber()
            ],
            'toolOwnerTypeId' => [
                'required',
                new ToolOwnerTypeNotValid()
            ],
            'attachment' => [
                'required',
                new FileValid()
            ],
            'toolTypeId' => [
                'required',
                new ToolTypeValid()
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
