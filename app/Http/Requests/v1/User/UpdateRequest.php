<?php

namespace App\Http\Requests\v1\User;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\AlphaSpaceDotNumber;
use Illuminate\Validation\Rules\Password;

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
            'name' => [
                'required',
                'min:5',
                'max:100',
                new AlphaSpaceDotComma(),
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'min:5',
                'max:150',
                sprintf('unique:users,email,%s', $this->modelId())
            ],
            'address' => [
                'required',
                'min:10',
                'max:256',
                // new AlphaSpaceDotNumber()
            ],
            'password' => [
                Password::min(6)->mixedCase()->numbers()
            ],
            'phone' => [
                // 'required',
                // 'numeric',
                // 'digits_between:10,16',
                sprintf('unique:users,phone,%s', $this->modelId())
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
