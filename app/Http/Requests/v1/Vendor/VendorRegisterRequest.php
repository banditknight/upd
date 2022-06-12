<?php

namespace App\Http\Requests\v1\Vendor;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\CityValid;
use App\Rules\CompanyTypeValid;
use App\Rules\CountryValid;
use App\Rules\DistrictValid;
use App\Rules\DomainValid;
use App\Rules\FileValid;
use App\Rules\ProvinceValid;
use App\Rules\ReferenceValid;
use App\Rules\VendorTypeInformationValid;

class VendorRegisterRequest extends \App\Http\Requests\AbstractRequest
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
            'domainId' => [
                'required',
                new DomainValid()
            ],
            'companyTypeId' => [
                'required',
                new CompanyTypeValid()
            ],
            'name' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            'vendorTypeInformation' => [
                'required',
                new VendorTypeInformationValid()
            ],
            'presidentDirectorName' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            // 'referenceId' => [
            //     'required',
            //     new ReferenceValid()
            // ],
            'secondAddress' => [
                new AlphaSpaceDotNumber()
            ],
            'address' => [
                'required'
            ],
            'countryId' => [
                'required',
                new CountryValid()
            ],
            'provinceId' => [
                'required',
                new ProvinceValid()
            ],
            'cityId' => [
                'required',
                new CityValid()
            ],
            'districtId' => [
                'required',
                new DistrictValid()
            ],
            'postalCode' => [
                'required',
                'integer'
            ],
            'phone' => [
                'required',
                'numeric',
                'unique:vendors,phone'
            ],
            // 'faxMailNumber' => 'required',
            'email' => [
                'required',
                'unique:vendors,email'
            ],
            // 'website' => [
            //     'url'
            // ],
            'picFullName' => [
                'required',
                new AlphaSpaceDotComma()
            ],
            'picMobileNumber' => [
                'required',
                'numeric',
                'unique:users,phone'
            ],
            'picEmail' => [
                'required',
                'unique:users,email'
            ],
            // 'pkpNumber' => [
            //     'required',
            //     'numeric',
            // ],
            // 'pkpAttachment' => [
            //     'required',
            //     new FileValid()
            // ],
            'taxIdentificationNumber' => [
                'required',
                'numeric',
                'digits_between:15,16',
                'unique:vendors,taxIdentificationNumber'
            ],
            'taxIdentificationAttachment' => [
                'required',
                new FileValid()
            ],
            'isAcceptTermAndCondition' => 'required'
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
