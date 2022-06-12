<?php

namespace App\Models\v1;

/**
 * App\Models\v1\ProductGroupCode
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroupCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductGroupCode extends AbstractModel
{
    protected $table = 'productGroupCodes';

    protected $fillable = [
        'code',
        'name',
        'description',
    ];
}
