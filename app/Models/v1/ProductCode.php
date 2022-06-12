<?php

namespace App\Models\v1;

/**
 * App\Models\v1\ProductCode
 *
 * @property int $id
 * @property int $productGroupCodeId
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode whereProductGroupCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCode extends AbstractModel
{
    protected $table = 'productCodes';

    protected $fillable = [
        'productGroupCodeId',
        'code',
        'name',
        'description',
    ];

    protected $appends = [
        'productGroup'
    ];

    public function getProductGroupAttribute()
    {
        return ProductGroupCode::find($this->productGroupCodeId);
    }    
}
