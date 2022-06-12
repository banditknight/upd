<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\WorkPeriod
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\WorkPeriodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPeriod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkPeriod extends AbstractModel
{
    use HasFactory;

    protected $table = 'workPeriods';

    protected $fillable = [
        'name'
    ];
}
