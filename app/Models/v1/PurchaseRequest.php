<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\PurchaseRequest
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\PurchaseRequestFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $tenderId
 * @property string $no
 * @property int $departmentId
 * @property int $itemTypeId
 * @property int $currencyId
 * @property string $woNo
 * @property string $woTitle
 * @property string $document
 * @property-read mixed $currency
 * @property-read mixed $department
 * @property-read mixed $grand_total
 * @property-read mixed $item
 * @property-read mixed $item_type
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereItemTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereWoNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseRequest whereWoTitle($value)
 */
class PurchaseRequest extends AbstractModel
{
    use HasFactory;

    protected $table = 'purchaseRequests';

    protected $fillable = [
        'no',
        'name',
        'departmentId',
        'itemTypeId',
        'currencyId',
        'woNo',
        'woTitle',
        'document',
        'confirmedDate',
        'totalAmount',
        'totalQty',
        'docStatusId',
        'prType',
    ];

    protected $hidden = [
        'tenderId',
        'departmentId',
        'itemTypeId',
        'currencyId',
        'updated_at',
        'created_at',
    ];

    protected $appends = [
        'department',
        'itemType',
        'currency',
        'createdAt',
        'item',
        'grandTotal',
        'confirmDate'
    ];

    public function getDepartmentAttribute()
    {
        return Department::find($this->departmentId);
    }

    public function getItemTypeAttribute()
    {
        return null;
    }

    public function getCreatedAtAttribute()
    {
        if (!isset($this->attributes['created_at'])) {
            return null;
        }

        return $this->attributes['created_at'] ?
            Carbon::createFromFormat(
                env('TIMESTAMP_FORMAT') === 'SQL_SERVER' ?
                    self::DEFAULT_TIMESTAMP_FORMAT_SQL_SERVER : self::DEFAULT_TIMESTAMP_FORMAT_MYSQL,
                $this->attributes['created_at']
            )->timestamp : 0;
    }

    public function getConfirmDateAttribute()
    {
        return [
            'timestamp' => Carbon::parse($this->confirmedDate)->unix(),
            'diffForHumans' => Carbon::parse($this->confirmedDate)->diffForHumans(),
        ];
    }

    public function getCurrencyAttribute()
    {
        if (!$this->currencyId) {
            return null;
        }
        return Currency::find($this->currencyId)->only(['id', 'code', 'name']);
    }

    public function getItemAttribute()
    {
        return PurchaseRequestItem::where('purchaseRequestId', $this->id)->get();
    }

    public function getGrandTotalAttribute()
    {
        $sumamnt = PurchaseRequestItem::where('purchaseRequestId', $this->id)->sum('estimationUnitCost');
        $sumqty = PurchaseRequestItem::where('purchaseRequestId', $this->id)->sum('qty');

        return $sumamnt * $sumqty;
    }
}
