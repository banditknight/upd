<?php

namespace App\Http\Requests\v1\Currency;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaUpperUnderScore;
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
            'code' => [
                'required',
                new AlphaUpperUnderScore()
            ],
            'name' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            'symbol' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            'countryId' => [
                'required',
                'integer',
                new CountryValid()
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
