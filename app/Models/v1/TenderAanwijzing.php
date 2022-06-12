<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TenderAanwijzing
 *
 * @property int $id
 * @property int $tenderId
 * @property string $eventName
 * @property string $venue
 * @property string $from
 * @property string $to
 * @property int $stateId
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderAanwijzing whereVenue($value)
 * @mixin \Eloquent
 * @property-read mixed $state
 */
class TenderAanwijzing extends AbstractModel
{
    use HasFactory;

    protected $table = 'tenderAanwijzings';

    protected $fillable = [
        'tenderId',
        'eventName',
        'venue',
        'from',
        'to',
        'stateId',
        'note'
    ];

    protected $hidden = [
        'stateId',
        'updated_at',
        'created_at'
    ];

    public $appends = [
        'state'
    ];

    public function getStateAttribute()
    {
        return State::find($this->stateId);
    }
}
