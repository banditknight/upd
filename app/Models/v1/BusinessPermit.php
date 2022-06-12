<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\BusinessPermit
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $businessPermitTypeId
 * @property string $attachment
 * @property string $number
 * @property int $validFromDate
 * @property int $validThruDate
 * @property string $issuedBy
 * @property string|null $otherBusinessPermitType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $valid_from_date
 * @property-write mixed $valid_thru_date
 * @method static \Database\Factories\v1\BusinessPermitFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereBusinessPermitTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereIssuedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereOtherBusinessPermitType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereValidFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereValidThruDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPermit whereVendorId($value)
 * @mixin \Eloquent
 */
class BusinessPermit extends AbstractModel
{
    use HasFactory;

    protected $table = 'businessPermits';

    protected $fillable = [
        'userId',
        'vendorId',
        'businessPermitTypeId',
        'legalOrganizationScaleId',
        'attachment',
        'number',
        'validFromDate',
        'validThruDate',
        'issuedBy',
        'otherBusinessPermitType',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'businessPermitType',
        'legalOrganizationScale',
    ];

    public function setValidFromDateAttribute($value)
    {
        $this->attributes['validFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setValidThruDateAttribute($value)
    {
        $this->attributes['validThruDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getBusinessPermitTypeAttribute()
    {
        return BusinessPermitType::find($this->businessPermitTypeId);
    }

    public function getLegalOrganizationScaleAttribute()
    {
        return [];
    }
}
