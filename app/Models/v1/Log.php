<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Log
 *
 * @property int $id
 * @property int|null $userId
 * @property int|null $vendorId
 * @property string $method
 * @property string|null $oldValue
 * @property string|null $newValue
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereNewValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereVendorId($value)
 * @mixin \Eloquent
 */
class Log extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'content',
        'method',
        'oldValue',
        'newValue',
        'ipAddress',
        'token',
        'table',
        'recordID',
        'action',
    ];

    protected $appends = [
        'user',
    ];

    public function getUserAttribute()
    {
        $user = User::find($this->userId);

        if (!$user) {
            return null;
        }

        return $user->name;
    }    
}
