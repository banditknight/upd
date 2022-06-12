<?php

namespace App\Http\Requests\v1\BankAccount;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use App\Rules\BankValid;
use App\Rules\CurrencyValid;

class UpdateRequest extends \App\Http\Requests\AbstractRequest
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
            'bankId' => [
                'required',
                'numeric',
                new BankValid()
            ],
            'accountNumber' => [
                'required',
                'numeric',
                'digits_between:5,32',
                sprintf('unique:bankAccounts,accountNumber,%s', $this->modelId())
            ],
            'accountHolderName' => [
                'required',
                'min:3',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'bankAddress' => [
                'required',
                'min:3',
                'max:256',
                new AlphaSpaceDotNumber()
            ],
            'currencyId' => [
                'required',
                'numeric',
                new CurrencyValid()
            ],
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
