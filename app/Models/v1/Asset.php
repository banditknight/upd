<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Asset
 *
 * @property int $id
 * @property int|null $userId
 * @property string $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $vendorId
 * @property-read mixed $raw_path_attachment
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereVendorId($value)
 */
class Asset extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'attachment',
        'mimeType',
    ];

    protected $hidden = [
        // 'userId',
        'attachment',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
    //    'rawPathAttachment',
        'url'
    ];

    public function getAttachmentAttribute()
    {
        return str_replace(env('REPLACE_ATTACHMENT_PATH'), env('ASSET_BASE_URL'), $this->attributes['attachment']);
    }

    public function getRawPathAttachmentAttribute()
    {
        return $this->attributes['attachment'];
    }

    public function getUrlAttribute()
    {
        $path = 'pdf';
        if($this->mimeType !== 'application/pdf'){
            $path = 'assets';
        }

        return sprintf('%s%s?id=%d',
            env('ASSET_BASE_URL'),
            $path,
            $this->id
        );
    }
}
