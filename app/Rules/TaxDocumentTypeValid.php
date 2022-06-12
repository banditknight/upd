<?php

namespace App\Rules;

use App\Models\v1\TaxDocumentType;
use Illuminate\Contracts\Validation\Rule;

class TaxDocumentTypeValid implements Rule
{
    public function passes($attribute, $value)
    {
        return TaxDocumentType::find($value);
    }

    public function message()
    {
        return __('validation.tax_document_type_not_valid');
    }
}
