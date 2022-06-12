<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\BoardType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\BoardTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoardType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BoardType extends AbstractModel
{
    use HasFactory;

    protected $table = 'boardTypes';

    protected $fillable = [
        'code',
        'name'
    ];
}
