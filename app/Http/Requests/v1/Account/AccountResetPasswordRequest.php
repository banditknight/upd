<?php

namespace App\Http\Requests\v1\Account;

use App\Rules\Confirmed;
use Illuminate\Validation\Rules\Password;

class AccountResetPasswordRequest extends \App\Http\Requests\AbstractRequest
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
            'token' => [
                'required'
            ],
            'password' => [
                'required',
                Password::min(6)->mixedCase()->numbers(),
                new Confirmed()
            ],
            'confirmPassword' => [
                'required'
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
