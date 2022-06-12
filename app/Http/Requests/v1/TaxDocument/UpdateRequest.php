<?php

namespace App\Http\Requests\v1\TaxDocument;

use App\Rules\FileValid;
use App\Rules\TaxDocumentTypeValid;
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
            'taxDocumentTypeId' => [
                'required',
                'numeric',
                new TaxDocumentTypeValid()
            ],
            'number' => [
                'required',
                'numeric',
                'digits_between:10,32',
            ],
            'issuedDate' => [
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
