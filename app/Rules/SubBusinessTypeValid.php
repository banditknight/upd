<?php

namespace App\Rules;

use App\Models\v1\SubBusinessType;
use Illuminate\Contracts\Validation\Rule;

class SubBusinessTypeValid implements Rule
{
    protected $request;

    public function __construct()
    {
        $this->request = request();
    }

    public function passes($attribute, $value)
    {
        if (!$this->request->has('businessTypeId')) {
            return false;
        }

        $subBusinessType = SubBusinessType::find($value);

        return $subBusinessType && (int)$subBusinessType->businessTypeId === (int)$this->request->request->get('businessTypeId');
    }

    public function message()
    {
        return __('validation.sub_business_type_not_valid');
    }
}
