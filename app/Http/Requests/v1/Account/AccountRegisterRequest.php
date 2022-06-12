<?php

namespace App\Http\Requests\v1\Account;

use App\Rules\AlphaSpaceDotNumber;
use Illuminate\Validation\Rules\Password;

class AccountRegisterRequest extends \App\Http\Requests\AbstractRequest
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
            'name' => 'required',
            'address' => [
                'required',
                new AlphaSpaceDotNumber()
            ],
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => [
                'required',
                Password::min(6)->mixedCase()->numbers()->uncompromised()
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
