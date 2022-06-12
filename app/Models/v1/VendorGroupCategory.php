<?php

namespace App\Models\v1;

/**
 * App\Models\v1\VendorGroupCategory
 *
 * @property int $id
 * @property int $vendorGroupClassificationId
 * @property string $code
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $vendor_group_classification
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupCategory whereVendorGroupClassificationId($value)
 * @mixin \Eloquent
 */
class VendorGroupCategory extends AbstractModel
{
    protected $table = 'vendorGroupCategories';

    protected $fillable = [
        'vendorGroupClassificationId',
        'code',
        'description'
    ];

    protected $hidden = [
        'vendorGroupClassificationId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'vendorGroupClassification'
    ];

    public function getVendorGroupClassificationAttribute()
    {
        return VendorGroupClassification::find($this->vendorGroupClassificationId);
    }
}
