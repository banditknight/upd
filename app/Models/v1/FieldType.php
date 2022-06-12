<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\FieldType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\FieldTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FieldType extends AbstractModel
{
    use HasFactory;

    protected $table = 'fieldTypes';
}
