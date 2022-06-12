<?php

namespace App\Models\v1;

use Carbon\Carbon;

/**
 * App\Models\v1\Certification
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $certificationTypeId
 * @property string $description
 * @property int $validFrom
 * @property int $validThruDate
 * @property string $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $valid_from
 * @property-write mixed $valid_thru_date
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCertificationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereValidFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereValidThruDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereVendorId($value)
 * @mixin \Eloquent
 * @property-read mixed $certification_type
 */
class Certification extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'certificationTypeId',
        'description',
        'validFrom',
        'validThruDate',
        'attachment'
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'certificationTypeId',
        'updated_at',
        'created_at'
    ];

    protected $appends = [
        'certificationType'
    ];

    public function setValidFromAttribute($value)
    {
        $this->attributes['validFrom'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setValidThruDateAttribute($value)
    {
        $this->attributes['validThruDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getCertificationTypeAttribute()
    {
        return CertificationType::find($this->certificationTypeId);
    }
}
