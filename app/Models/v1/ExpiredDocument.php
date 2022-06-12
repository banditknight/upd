<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\ExpiredDocument
 *
 * @property int $id
 * @property int $vendorId
 * @property int $businessPermitTypeId
 * @property int $businessPermitNumber
 * @property int $validFromDate
 * @property int $validThruDate
 * @property int $stateId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $business_permit_type
 * @property-read mixed $state
 * @property-read mixed $vendor
 * @property-write mixed $valid_from_date
 * @property-write mixed $valid_thru_date
 * @method static \Database\Factories\v1\ExpiredDocumentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereBusinessPermitNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereBusinessPermitTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereValidFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereValidThruDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpiredDocument whereVendorId($value)
 * @mixin \Eloquent
 */
class ExpiredDocument extends AbstractModel
{
    use HasFactory;

    protected $table = 'expiredDocuments';

    protected $fillable = [
        'vendorId',
        'businessPermitTypeId',
        'businessPermitNumber',
        'validFromDate',
        'validThruDate',
        'stateId',
    ];

    protected $hidden = [
        'vendorId',
        'businessPermitTypeId',
        'stateId',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'vendor',
        'businessPermitType',
        'state'
    ];

    public function getVendorAttribute()
    {
        return Vendor::where('id', '=', $this->vendorId)->get(['id', 'name']);
    }

    public function getBusinessPermitTypeAttribute()
    {
        return BusinessPermitType::find($this->businessPermitTypeId);
    }

    public function getStateAttribute()
    {
        return State::find($this->stateId);
    }

    public function setValidFromDateAttribute($value)
    {
        $this->attributes['validFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setValidThruDateAttribute($value)
    {
        $this->attributes['validThruDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }
}
