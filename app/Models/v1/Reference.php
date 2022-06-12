<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Reference
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\ReferenceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Reference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reference query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reference whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reference whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reference extends AbstractModel
{
    use HasFactory;
}
