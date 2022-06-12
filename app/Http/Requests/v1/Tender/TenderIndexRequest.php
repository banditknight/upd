<?php

namespace App\Http\Requests\v1\Tender;

class TenderIndexRequest extends \App\Http\Requests\AbstractRequest
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
                'integer',
            ],
            'tenderTypeId' => [
                'integer',
            ],
            'from' => 'date_format:d-m-Y',
            'to' => 'date_format:d-m-Y',
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
