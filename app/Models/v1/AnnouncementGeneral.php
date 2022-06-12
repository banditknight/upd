<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Log as LogAble;

/**
 * App\Models\v1\AnnouncementGeneral
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\AnnouncementGeneralFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementGeneral whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnnouncementGeneral extends AbstractModel
{
    use HasFactory, LogAble;

    protected $table = 'announcementGenerals';


    protected $appends = [
        'createdAt'
    ];

    public function getCreatedAtAttribute()
    {
        $createdAt = null;

        try {
            $createdAt = $this->attributes['created_at'] ?
                Carbon::createFromFormat(
                    env('TIMESTAMP_FORMAT') === 'SQL_SERVER' ?
                        self::DEFAULT_TIMESTAMP_FORMAT_SQL_SERVER : self::DEFAULT_TIMESTAMP_FORMAT_MYSQL
                    , $this->attributes['created_at'])->timestamp :
                null;
        } catch (\Exception $e) {
            $this->info($e->getMessage());
        }

        return $createdAt;
    }
}
