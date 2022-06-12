<?php

namespace App\Models\v1;

/**
 * App\Models\v1\UnitOfMeasure
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitOfMeasure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UnitOfMeasure extends AbstractModel
{
    protected $table = 'unitOfMeasures';

    protected $fillable = [
        'code',
        'name',
        'description'
    ];
}
