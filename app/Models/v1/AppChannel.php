<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\AppChannel
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\AppChannelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppChannel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppChannel extends AbstractModel
{
    use HasFactory;

    protected $table = 'appChannels';

    protected $fillable = [
        'name'
    ];
}
