<?php

namespace App\Models\v1;

/**
 * App\Models\v1\District
 *
 * @property int $id
 * @property string $city_id
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\v1\City $city
 * @property-read mixed $city_name
 * @property-read mixed $province_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\v1\Village[] $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class District extends AbstractModel
{
    protected $table = 'districts';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id');
    }

    public function getCityNameAttribute()
    {
        return $this->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->city->province->name;
    }
}
