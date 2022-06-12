<?php

namespace App\Models\v1;

use App\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\SubBusinessType
 *
 * @property int $id
 * @property int $businessTypeId
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $business_type
 * @method static \Database\Factories\v1\SubBusinessTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubBusinessType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubBusinessType extends AbstractModel
{
    use HasFactory, TransformableTrait;

    protected $table = 'subBusinessTypes';

    protected $fillable = [
        'businessTypeId',
        'code',
        'name'
    ];

    protected $hidden = [
        'businessTypeId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'businessType'
    ];

    public function getBusinessTypeAttribute()
    {
        return BusinessType::find($this->businessTypeId);
    }
}
