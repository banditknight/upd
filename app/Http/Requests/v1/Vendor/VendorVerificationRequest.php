<?php

namespace App\Http\Requests\v1\Vendor;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\CityValid;
use App\Rules\CompanyTypeValid;
use App\Rules\CountryValid;
use App\Rules\DistrictValid;
use App\Rules\DomainValid;
use App\Rules\ProvinceValid;
use App\Rules\ReferenceValid;
use App\Rules\VendorTypeInformationValid;

class VendorVerificationRequest extends \App\Http\Requests\AbstractRequest
{
    protected function validationData(): array
    {
        return $this->all();
    }

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
            'vendorId' => [
                'unique:vendorVerifications,vendorId'
            ],
            'comment' => [
                'required',
                'min:20',
                'max:256'
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
            'vendorId.unique' => __('validation.vendor_verification_should_be_unique')
        ];
    }
}
