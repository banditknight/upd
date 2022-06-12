<?php

namespace App\Http\Requests\v1\TenderItemComply;

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
            'tenderId' => [
                'required',
                'numeric',
            ],
            'tenderItemId' => [
                'required',
                'numeric'
            ],
            'isComply' => [
                'required',
                'boolean',
            ],
            'isTbe' => [
                'required',
                'required_if:isCbe,false',
                'boolean',
            ],
            'isCbe' => [
                'required',
                'required_if:isTbe,false',
                'boolean',
            ],
            'unitPrice' => [
                'required_if:isCbe,true',
                'numeric',
                'max:20000000000'
            ],
            'additionalCost' => [
                'required_if:isCbe,true',
                'numeric',
                'max:20000000000'
            ],
            'additionalCostDescription' => [
                'required_if:additionalCost,>0',
                'min:10',
                'max:256',
            ],
            'comment' => [
                'min:10',
                'max:256',
                'required_if:isComply,0'
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
