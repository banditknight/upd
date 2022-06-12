<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Education
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\EducationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Education extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
