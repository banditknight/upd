<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\User as UserTrait;

/**
 * App\Models\v1\TenderItem
 *
 * @property int $id
 * @property int $tenderId
 * @property string $productCodeId
 * @property string $productGroupCodeId
 * @property string $description
 * @property int $quantity
 * @property string $measurementUnitSymbol
 * @property int $currencyId
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TenderItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereMeasurementUnitSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereProductCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereProductGroupCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereValue($value)
 * @mixin \Eloquent
 * @property-read mixed $comply
 * @property int $unitOfMeasureId
 * @property-read mixed $currency
 * @property-read mixed $product_code
 * @property-read mixed $product_group_code
 * @property-read mixed $unit_of_measure
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItem whereUnitOfMeasureId($value)
 */
class TenderItem extends AbstractModel
{
    use HasFactory, UserTrait;

    protected $table = 'tenderItems';

    protected $fillable = [
        'tenderId',
        'productCodeId',
        'productGroupCodeId',
        'description',
        'quantity',
        'unitOfMeasureId',
        'currencyId',
        'value',
        'purchaseRequestItemId',
    ];

    protected $appends = [
        'complyCbe',
        'complyTbe',
        'productCode',
        'productGroupCode',
        'unitOfMeasure',
        'currency',
        'itemComponent',
        'itemPr',
    ];

    protected $hidden = [
        'tenderId',
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

    public function getComplyCbeAttribute()
    {
        $vendor = $this->getUser();

        if ($vendor && !$vendor->hasRole('vendor')) {
            return null;
        }

        return TenderItemComply::where('tenderItemId', '=', $this->id)
            ->where('vendorId', '=', $vendor->vendorId ?? 0)
            ->where('isCbe', '=', 1)
            ->where('isTbe', '=', 0)
            ->get()
            ->last();
    }

    public function getComplyTbeAttribute()
    {
        $vendor = $this->getUser();

        if ($vendor && !$vendor->hasRole('vendor')) {
            return null;
        }

        return TenderItemComply::where('tenderItemId', '=', $this->id)
            ->where('vendorId', '=', $vendor->vendorId ?? 0)
            ->where('isCbe', '=', 0)
            ->where('isTbe', '=', 1)
            ->get()
            ->last();
    }

    public function getItemComponentAttribute()
    {
        return TenderItemComponent::where('tenderId', '=', $this->tenderId)->get();
    }

    public function getItemPrAttribute()
    {
        $vendor = $this->getUser();

        if ($vendor && $vendor->hasRole('vendor')) {
            $pritem = PurchaseRequestItem::find($this->purchaseRequestItemId);
            if($pritem != null){
                return $pritem->only(['isService','description','qty','uom','estimationUnitCost']);
            }
            return null;
        }

        return PurchaseRequestItem::find($this->purchaseRequestItemId);
    }
}
