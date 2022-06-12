<?php

namespace App\Http\Requests\v1\Bank;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaUpperUnderScore;
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
            'code' => [
                'required',
                'digits:3'
            ],
            'name' => [
                'required',
                'min:3',
                'max:100',
                new AlphaSpaceDotComma()
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
