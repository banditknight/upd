<?php

namespace App\Http\Requests\v1\Workflow;

use App\Http\Requests\AbstractRequest;

class IndexRequest extends AbstractRequest
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
            'model' => [
                'required',
                'alpha'
            ],
            'mid' => [
                'required',
                'numeric'
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
