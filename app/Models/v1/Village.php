<?php

namespace App\Models\v1;

use Laravolt\Indonesia\Models\Model;

/**
 * App\Models\v1\Village
 *
 * @property string $id
 * @property string $district_id
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read District $district
 * @property-read mixed $city_name
 * @property-read mixed $district_name
 * @property-read mixed $province_name
 * @method static \Illuminate\Database\Eloquent\Builder|Village newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model search($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Village extends AbstractModel
{
    protected $table = 'villages';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function getDistrictNameAttribute()
    {
        return $this->district->name;
    }

    public function getCityNameAttribute()
    {
        return $this->district->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->district->city->province->name;
    }
}
