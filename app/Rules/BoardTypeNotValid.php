<?php

namespace App\Rules;

use App\Models\v1\BoardType;
use Illuminate\Contracts\Validation\Rule;

class BoardTypeNotValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)BoardType::find($value);
    }

    public function message()
    {
        return __('validation.board_type_not_valid');
    }
}
