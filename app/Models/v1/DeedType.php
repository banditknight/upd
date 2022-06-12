<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\DeedType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\DeedTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeedType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeedType extends AbstractModel
{
    use HasFactory;

    protected $table = 'deedTypes';

    protected $fillable = [
        'code',
        'name'
    ];
}
