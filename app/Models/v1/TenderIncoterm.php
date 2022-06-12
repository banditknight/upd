<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderIncoterm
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderIncoterm whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderIncoterm extends AbstractModel
{
    protected $table = 'tenderIncoterms';

    protected $fillable = [
        'code',
        'description',
    ];
}
