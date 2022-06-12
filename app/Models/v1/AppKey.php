<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\AppKey
 *
 * @property int $id
 * @property string $key
 * @property string $channelId
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\AppKeyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppKey whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $channel
 */
class AppKey extends AbstractModel
{
    use HasFactory;

    protected $table = 'appKeys';

    protected $fillable = [
        'key',
        'channelId'
    ];

    protected $hidden = [
        'channelId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'channel'
    ];

    public function getChannelAttribute()
    {
        return AppChannel::find($this->channelId);
    }
}
