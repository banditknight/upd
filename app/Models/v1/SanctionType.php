<?php

namespace App\Models\v1;

/**
 * App\Models\v1\SanctionType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $score
 * @method static \Illuminate\Database\Eloquent\Builder|SanctionType whereScore($value)
 */
class SanctionType extends AbstractModel
{
    protected $table = 'sanctionTypes';

    protected $fillable = [
        'code',
        'name',
        'description',
        'score',
    ];
}
