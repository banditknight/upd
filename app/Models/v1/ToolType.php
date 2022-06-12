<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\ToolType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\ToolTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToolType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ToolType extends AbstractModel
{
    use HasFactory;

    protected $table = 'toolTypes';

    protected $fillable = [
        'name'
    ];
}
