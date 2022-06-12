<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderNegotiation
 *
 * @property int $id
 * @property int $tenderId
 * @property string $status
 * @property string $initiatorName
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereInitiatorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderNegotiation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderNegotiation extends AbstractModel
{
    protected $table = 'tenderNegotiations';

    protected $fillable = [
        'tenderId',
        'status',
        'initiatorName'
    ];
}
