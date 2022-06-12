<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Sanction
 *
 * @property int $id
 * @property int $vendorId
 * @property int $sanctionTypeId
 * @property string $description
 * @property int $issuedDate
 * @property int $expiredDate
 * @property int $actionId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $action
 * @property-read mixed $sanction_type
 * @method static \Database\Factories\v1\SanctionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereExpiredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereIssuedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereSanctionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanction whereVendorId($value)
 * @mixin \Eloquent
 */
class Sanction extends AbstractModel
{
    use HasFactory;

    protected $hidden = [
        'vendorId',
        'actionId',
        'sanctionTypeId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'action',
        'sanctionType',
    ];

    public function getActionAttribute()
    {

    }

    public function getSanctionTypeAttribute()
    {
        return SanctionType::find($this->sanctionTypeId, [
            'code', 'name', 'description', 'score'
        ]);
    }
}
