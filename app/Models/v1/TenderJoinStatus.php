<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderJoinStatus
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderJoinStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderJoinStatus extends AbstractModel
{
    protected $table = 'tenderJoinStatuses';

    protected $fillable = [
        'name',
        'description',
    ];
}
