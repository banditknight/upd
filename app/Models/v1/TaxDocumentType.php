<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TaxDocumentType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TaxDocumentTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocumentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaxDocumentType extends AbstractModel
{
    use HasFactory;

    protected $table = 'taxDocumentTypes';
}
