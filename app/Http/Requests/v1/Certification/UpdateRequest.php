<?php

namespace App\Http\Requests\v1\Certification;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\CertificationTypeValid;
use App\Rules\FileValid;
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
            'certificationTypeId' => [
                'required',
                'numeric',
                new CertificationTypeValid()
            ],
            'description' => [
                'required',
                'min:3',
                'max:256',
                new AlphaSpaceDotComma()
            ],
            'validFrom' => [
                'required',
                'date_format:d-m-Y'
            ],
            'validThruDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'attachment' => [
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
