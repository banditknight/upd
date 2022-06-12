<?php

namespace App\Http\Requests\v1\Workflow;

use App\Http\Requests\AbstractRequest;
use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaUnderScore;
use App\Rules\AlphaUpperUnderScore;

class StoreRequest extends AbstractRequest
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
            'modelName' => [
                'required',
                'alpha'
            ],
            'name' => [
                'required',
            ],
            'code' => [
                'required',
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
