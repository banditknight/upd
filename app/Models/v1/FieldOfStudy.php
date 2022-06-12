<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\FieldOfStudy
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\FieldOfStudyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FieldOfStudy extends AbstractModel
{
    use HasFactory;

    protected $table = 'fieldOfStudies';

    protected $fillable = [
        'name'
    ];
}
