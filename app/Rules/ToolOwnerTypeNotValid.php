<?php

namespace App\Rules;

use App\Models\v1\ToolOwnerType;
use Illuminate\Contracts\Validation\Rule;

class ToolOwnerTypeNotValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)ToolOwnerType::find($value);
    }

    public function message()
    {
        return __('validation.tool_owner_type_not_valid');
    }
}
