<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Province
 *
 * @property int $id
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\v1\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\v1\District[] $districts
 * @property-read int|null $districts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Province extends AbstractModel
{
    protected $table = 'provinces';

    protected $fillable = [
        'id',
        'name'
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }

    public function districts()
    {
        return $this->hasManyThrough(District::class, City::class);
    }
}
