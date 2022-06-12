<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TenderDocument
 *
 * @property int $id
 * @property int $tenderId
 * @property string $name
 * @property string $description
 * @property int $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TenderDocumentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderDocument extends AbstractModel
{
    use HasFactory;

    protected $table = 'tenderDocuments';

    protected $fillable = [
        'tenderId',
        'name',
        'description',
        'attachment',
    ];
}
