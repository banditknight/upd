<?php

namespace App\Http\Requests\v1\FinancialStatement;

use App\Rules\CurrencyValid;
use App\Rules\FinancialReportValid;

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
            'financialStatementDate' => [
                'required',
                'date_format:d-m-Y'
            ],
            'financialReportId' => [
                'required',
                'numeric',
                new FinancialReportValid()
            ],
            'publicAccountantFullName' => [
                'required',
                'min:3',
                'max:100',
            ],
            'year' => [
                'required',
                'numeric',
                'digits_between:4,4',
            ],
            'currencyId' => [
                'required',
                'numeric',
                new CurrencyValid()
            ],
            'currentAssets' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'nonCurrentAssets' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'otherAssets' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'currentPayable' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'otherPayable' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'paidInCapital' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'retainedEarning' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
            ],
            'annualRevenue' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999999999',
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
