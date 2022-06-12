<?php

namespace App\Models\v1;

/**
 * App\Models\v1\VendorGroup
 *
 * @property int $id
 * @property int $vendorGroupCategoryId
 * @property string $code
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $vendor_group_category
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroup whereVendorGroupCategoryId($value)
 * @mixin \Eloquent
 */
class VendorGroup extends AbstractModel
{
    protected $table = 'vendorGroups';

    protected $fillable = [
        'vendorGroupCategoryId',
        'code',
        'description',
    ];

    protected $hidden = [
        'vendorGroupCategoryId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'vendorGroupCategory'
    ];

    public function getVendorGroupCategoryAttribute()
    {
        return VendorGroupCategory::find($this->vendorGroupCategoryId);
    }
}
