<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;

class RequestForQuotationItem extends AbstractModel
{
    protected $table = 'requestForQuotationItems';

    protected $fillable = [
        'rfqId',
        'productCodeId',
        'productGroupCodeId',
        'description',
        'quantity',
        'unitOfMeasureId',
        'currencyId',
        'value',
    ];

    protected $appends = [
        'productCode',
        'productGroupCode',
        'unitOfMeasure',
        'currency',
    ];

    protected $hidden = [
        'productCodeId',
        'productGroupCodeId',
        'unitOfMeasureId',
        'currencyId',
        'created_at',
        'updated_at'
    ];

    public function getProductCodeAttribute()
    {
        return ProductCode::find($this->productCodeId);
    }

    public function getProductGroupCodeAttribute()
    {
        return ProductGroupCode::find($this->productGroupCodeId);
    }

    public function getUnitOfMeasureAttribute()
    {
        return UnitOfMeasure::find($this->unitOfMeasureId)->only(['id', 'name']);
    }

    public function getCurrencyAttribute()
    {
        $currency = Currency::find($this->currencyId);
        if (!$currency) {
            return null;
        }

        return $currency->only(['id', 'name', 'code']);
    }

}
