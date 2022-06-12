<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderItemComponent
 *
 * @property int $id
 * @property int $tenderId
 * @property int $tenderItemId
 * @property int $unitOfMeasureId
 * @property int $currencyId
 * @property int $productCodeId
 * @property int $productGroupCodeId
 * @property string $description
 * @property int $quantity
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereProductCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereProductGroupCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereTenderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereUnitOfMeasureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponent whereValue($value)
 * @mixin \Eloquent
 */
class TenderItemComponent extends AbstractModel
{
    protected $table = 'tenderItemComponents';

    protected $fillable = [
        'tenderId',
        'tenderItemId',
        'productCodeId',
        'productGroupCodeId',
        'description',
        'quantity',
        'unitOfMeasureId',
        'currencyId',
        'value',
    ];
}
