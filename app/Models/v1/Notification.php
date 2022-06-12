<?php

namespace App\Models\v1;

use Carbon\Carbon;

/**
 * App\Models\v1\Notification
 *
 * @property int $id
 * @property int $toVendorId
 * @property int $toUserId
 * @property string $title
 * @property string $message
 * @property int $isRead
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereToUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereToVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Notification extends AbstractModel
{
    protected $fillable = [
        'toVendorId',
        'toUserId',
        'title',
        'message',
        'isRead',
        'context',
        'recordId',
    ];

    protected $hidden = [
        'toVendorId',
        'toUserId',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'createdAt',
        'updatedAt'
    ];

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ?
            Carbon::createFromFormat(
                env('TIMESTAMP_FORMAT') === 'SQL_SERVER' ?
                    self::DEFAULT_TIMESTAMP_FORMAT_SQL_SERVER : self::DEFAULT_TIMESTAMP_FORMAT_MYSQL
                , $this->attributes['created_at']
            )->timestamp : 0;
    }

    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ?
            Carbon::createFromFormat(
                env('TIMESTAMP_FORMAT') === 'SQL_SERVER' ?
                    self::DEFAULT_TIMESTAMP_FORMAT_SQL_SERVER : self::DEFAULT_TIMESTAMP_FORMAT_MYSQL
                , $this->attributes['updated_at']
            )->timestamp : 0;
    }
}
