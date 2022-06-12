<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\MenuAction
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\MenuActionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuAction extends AbstractModel
{
    use HasFactory;

    protected $table = 'menuActions';

    protected $fillable = [
        'code',
        'name'
    ];
}
