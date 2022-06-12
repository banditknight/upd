<?php

namespace App\Http\Requests\v1\Branch;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\CountryValid;
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
                'unique:vendors,faxMailNumber',
            ],
            'faxMailNumberExt' => [
                'nullable',
                'numeric',
            ],
            'email' => [
                'required',
                'email',
                'unique:vendors,email'
            ],
            'website' => [
                'url'
            ],
            'phone' => [
                'required',
                'numeric',
                'unique:vendors,phone'
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
