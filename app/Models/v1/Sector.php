<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Sector
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\SectorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sector query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sector whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sector whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sector extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
