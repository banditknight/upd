<?php

namespace App\Http\Requests\v1\Experience;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\BusinessTypeValid;
use App\Rules\CityValid;
use App\Rules\CountryValid;
use App\Rules\CurrencyValid;
use App\Rules\DistrictValid;
use App\Rules\FileValid;
use App\Rules\ProvinceValid;
use App\Rules\SubBusinessTypeValid;

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
            'businessTypeId' => [
                'required',
                'numeric',
                new BusinessTypeValid()
            ],
            'subBusinessTypeId' => [
                'required',
                'numeric',
                new SubBusinessTypeValid()
            ],
            'workPackageName' => [
                'required',
                'min:5',
                'max:256',
                new AlphaSpaceDotComma()
            ],
            'workPackageLocation' => [
                'required',
                'min:5',
                'max:256',
            ],
            'contactOwner' => [
                'required',
                'min:5',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'address' => [
                'required',
                'min:5',
                'max:100',
                new AlphaSpaceDotNumber()
            ],
            'countryId' => [
                'required',
                'numeric',
                new CountryValid()
            ],
            'provinceId' => [
                'required',
                'numeric',
                new ProvinceValid()
            ],
            'cityId' => [
                'required',
                'numeric',
                new CityValid()
            ],
            'districtId' => [
                'required',
                'numeric',
                new DistrictValid()
            ],
            'postalCode' => [
                'required',
                'min:3',
                'max:10',
            ],
            'contactPerson' => [
                'required',
                'min:5',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'phoneNumber' => [
                'required',
                'numeric',
                'digits_between:10,16',
            ],
            'contractValue' => [
                'required',
                'numeric',
                'max:20000000000'
            ],
            'contractNumber' => [
                'required',
                'min:5',
                'max:32'
            ],
            'contractHandOverLetterNumber' => [
                'required',
                'min:5',
                'max:32'
            ],
            'contractHandOverLetterDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'contractHandOverLetterAttachment' => [
                'required',
                'numeric',
                new FileValid()
            ],
            'validFromDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'validThruDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'currencyId' => [
                'required',
                'numeric',
                new CurrencyValid()
            ],
            'testimony' => [
                'required',
                'min:10',
                'max:256'
            ],
            'testimonyAttachment' => [
                'required',
                'numeric',
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
