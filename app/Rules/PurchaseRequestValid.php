<?php

namespace App\Rules;

use App\Models\v1\PurchaseRequest;
use Illuminate\Contracts\Validation\Rule;

class PurchaseRequestValid implements Rule
{
    public function passes($attribute, $value)
    {
        $purchaseRequest = PurchaseRequest::find($value);

        if (!$purchaseRequest) {
            return false;
        }

        return $purchaseRequest->tenderId === null;
    }

    public function message()
    {
        return __('validation.purchase_request_not_valid');
    }
}
