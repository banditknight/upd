<?php

namespace App\Models\v1;

use Carbon\Carbon;

/**
 * App\Models\v1\Deed
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $deedTypeId
 * @property string $number
 * @property int $issuedDate
 * @property string $notaryFullName
 * @property string $ackLetterNumber
 * @property int $ackLetterDate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $ack_letter_date
 * @property-write mixed $issued_date
 * @method static \Illuminate\Database\Eloquent\Builder|Deed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereAckLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereAckLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereDeedTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereIssuedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereNotaryFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deed whereVendorId($value)
 * @mixin \Eloquent
 */
class Deed extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'deedTypeId',
        'number',
        'issuedDate',
        'notaryFullName',
        'ackLetterNumber',
        'ackLetterDate',
    ];

    protected $appends = [
        'deedType'
    ];

    protected $hidden = [
        'deedTypeId'
    ];

    public function setIssuedDateAttribute($value)
    {
        $this->attributes['issuedDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setAckLetterDateAttribute($value)
    {
        $this->attributes['ackLetterDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getDeedTypeAttribute($value)
    {
        return DeedType::find($this->deedTypeId);
    }
}
