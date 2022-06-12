<?php

namespace App\Rules;

use App\Models\v1\ToolType;
use Illuminate\Contracts\Validation\Rule;

class ToolTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return (boolean)ToolType::find($value);
    }

    public function message()
    {
        return __('validation.tool_type_not_valid');
    }
}
