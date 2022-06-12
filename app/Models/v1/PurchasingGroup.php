<?php

namespace App\Models\v1;

/**
 * App\Models\v1\PurchasingGroup
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchasingGroup extends AbstractModel
{
    protected $table = 'purchasingGroups';

    protected $fillable = [
        'code',
        'name',
        'description',
    ];
}
