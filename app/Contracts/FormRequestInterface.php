<?php

namespace App\Contracts;

interface FormRequestInterface
{
    public function authorize(): bool;

    public function rules(): array;

    public function messages(): array;
}
