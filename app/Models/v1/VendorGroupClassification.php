<?php

namespace App\Models\v1;

/**
 * App\Models\v1\VendorGroupClassification
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorGroupClassification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VendorGroupClassification extends AbstractModel
{
    protected $table = 'vendorGroupClassifications';

    protected $fillable = [
        'code',
        'name'
    ];
}
