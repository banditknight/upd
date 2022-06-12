<?php

namespace App\Http\Requests\v1\Competency;

use App\Rules\BusinessTypeValid;
use App\Rules\SubBusinessTypeValid;
use App\Rules\VendorTypeValid;
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
            'businessTypeId' => [
                'required',
                'numeric',
                new BusinessTypeValid()
            ],
            'descriptionOfExperience' => [
                'required',
                'min:3',
                'max:256'
            ],
            'subBusinessTypeId' => [
                'required',
                'numeric',
                new SubBusinessTypeValid()
            ],
            'vendorTypeId' => [
                'required',
                'numeric',
                new VendorTypeValid()
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
