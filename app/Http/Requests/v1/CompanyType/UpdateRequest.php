<?php

namespace App\Http\Requests\v1\CompanyType;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaUpperUnderScore;
use App\Rules\DomainValid;
use Pearl\RequestValidate\RequestAbstract;

class UpdateRequest extends RequestAbstract
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
            'domainId' => [
                'required',
                'integer',
                new DomainValid()
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
