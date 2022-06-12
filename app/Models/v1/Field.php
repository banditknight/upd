<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Field
 *
 * @property int $id
 * @property int $fieldTypeId
 * @property int $tabId
 * @property string $label
 * @property string $name
 * @property string $description
 * @property string $placeholder
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $field_type
 * @method static \Database\Factories\v1\FieldFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field query()
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereTabId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Field extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'fieldTypeId',
        'tabId',
        'label',
        'name',
        'description',
        'placeholder',
        'index',
    ];

    protected $hidden = [
        'fieldTypeId',
        'tabId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'fieldType'
    ];

    public function getFieldTypeAttribute()
    {
        return FieldType::find($this->fieldTypeId, ['code', 'name']);
    }
}
