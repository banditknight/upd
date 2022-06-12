<?php

namespace App\Models\v1;

/**
 * App\Models\v1\VendorVerification
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorVerification whereVendorId($value)
 * @mixin \Eloquent
 */
class VendorVerification extends AbstractModel
{
    protected $table = 'vendorVerifications';

    protected $fillable = [
        'userId',
        'vendorId',
        'comment'
    ];
}
