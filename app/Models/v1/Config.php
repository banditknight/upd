<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Log
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string|null $description
 * @property boolean $isactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereNewValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereVendorId($value)
 * @mixin \Eloquent
 */
class Config extends AbstractModel
{
    protected $fillable = [
        'name',
        'value',
        'description',
        'isactive',
    ];
    
}
