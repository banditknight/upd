<?php

namespace App\Http\Requests\v1\Branch;

use App\Http\Requests\AbstractRequest;
use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\CountryValid;

class UpdateRequest extends AbstractRequest
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
                new AlphaSpaceDotComma()
            ],
            'address' => [
                'required',
                new AlphaSpaceDotNumber()
            ],
            'countryId' => [
                'required',
                'integer',
                new CountryValid()
            ],
            'postalCode' => [
                'required',
                'numeric'
            ],
            'faxMailNumber' => [
                'required',
                'numeric',
                sprintf('unique:vendors,faxMailNumber,%s', $this->modelId()),
            ],
            'faxMailNumberExt' => [
                'nullable',
                'numeric',
            ],
            'email' => [
                'required',
                'email',
                sprintf('unique:vendors,email,%s', $this->modelId())
            ],
            'website' => [
                'url'
            ],
            'phone' => [
                'required',
                'numeric',
                sprintf('unique:vendors,phone,%s', $this->modelId())
            ],
            'phoneExt' => [
                'nullable',
                'numeric'
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
