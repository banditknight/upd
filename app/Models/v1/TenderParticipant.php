<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TenderParticipant
 *
 * @property int $id
 * @property int $tenderId
 * @property int $userId
 * @property int $vendorId
 * @property int|null $tbeScore
 * @property int|null $cbeScore
 * @property int|null $ratioFinancial
 * @property int $joinStatusId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status
 * @property-read \App\Models\v1\Tender $tender
 * @property-read mixed $vendor
 * @method static \Database\Factories\v1\TenderParticipantFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereCbeScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereJoinStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereRatioFinancial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereTbeScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderParticipant whereVendorId($value)
 * @mixin \Eloquent
 */
class TenderParticipant extends AbstractModel
{
    use HasFactory;

    protected $table = 'tenderParticipants';

    protected $fillable = [
        'vendorId',
        'userId',
        'tenderId'
    ];

    protected $hidden = [
        'vendorId',
        'userId',
        'tenderId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'vendor',
        'tender',
        'status'
    ];

    public function getVendorAttribute()
    {
        if (!$this->vendorId) {
            return null;
        }

        $vendor = Vendor::find($this->vendorId);

        return $vendor ? $vendor->only(['id', 'name', 'registrationNumber']) : null;
    }

    public function getTenderAttribute()
    {
        if (!$this->tenderId) {
            return null;
        }

        $tender = Tender::find($this->tenderId);

        return $tender ? $tender->only(['id', 'number', 'name']) : null;
    }

    public function getStatusAttribute()
    {
        if (!$this->joinStatusId) {
            return null;
        }

        $status = TenderJoinStatus::find($this->joinStatusId);

        return $status ? $status->first() : null;
    }

    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }
}
