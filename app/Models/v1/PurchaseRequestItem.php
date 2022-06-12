<?php

namespace App\Models\v1;

use App\Traits\User as UserTrait;

/**
 * App\Models\v1\PurchaseRequestItem
 *
 * @property int $id
 * @property int|null $purchaseRequestId
 * @property string $catItemNo
 * @property string $description
 * @property int $qty
 * @property string $uom
 * @property int $estimationUnitCost
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereCatItemNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereEstimationUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem wherePurchaseRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequestItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchaseRequestItem extends AbstractModel
{
    use UserTrait;
    protected $table = 'purchaseRequestItems';

    private $curCode = null;

    protected $fillable = [
        'purchaseRequestId',
        'catItemNo',
        'materialNo',
        'description',
        'qty',
        'uom',
        'estimationUnitCost',
        'remarks',
        'isService',
    ];

    protected $appends = [
        'purchaseRequest',
        // 'currencyCode'
    ];

    protected $hidden = [
        'purchaseRequestId',
    ];

    public function getPurchaseRequestAttribute()
    {
        $pr = PurchaseRequest::find($this->purchaseRequestId);
        if(!$pr){
            return null;
        }
        $this->curCode = $pr->currency['code'];
        return $pr->only(['id','no']);
    }
    public function getCurrencyCodeAttribute(){
        return $this->curCode;
    }

}
