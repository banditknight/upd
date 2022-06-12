<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Log as LogAble;

/**
 * App\Models\v1\AnnouncementVendor
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\AnnouncementVendorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementVendor whereVendorId($value)
 * @mixin \Eloquent
 */
class AnnouncementVendor extends AbstractModel
{
    use HasFactory, LogAble;

    protected $table = 'announcementVendors';

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
        } catch (\Exception $ex) {
            $this->info($ex->getMessage());
        }

        return $createdAt;
    }
}
