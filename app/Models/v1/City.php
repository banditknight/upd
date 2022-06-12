<?php

namespace App\Models\v1;

/**
 * App\Models\v1\City
 *
 * @property int $id
 * @property string $province_id
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\v1\District[] $districts
 * @property-read int|null $districts_count
 * @property-read mixed $province_name
 * @property-read \App\Models\v1\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\v1\Village[] $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends AbstractModel
{
    protected $table = 'cities';

    public $timestamps = false;

    protected $casts = [
        'meta' => 'array',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id');
    }

    public function villages()
    {
        return $this->hasManyThrough(Village::class, District::class);
    }

    public function getProvinceNameAttribute()
    {
        return $this->province->name;
    }
}
