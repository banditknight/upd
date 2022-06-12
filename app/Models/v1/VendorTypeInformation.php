<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * App\Models\v1\VendorTypeInformation
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Database\Factories\v1\VendorTypeInformationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $code
 * @method static \Illuminate\Database\Eloquent\Builder|VendorTypeInformation whereCode($value)
 */
class VendorTypeInformation extends AbstractModel
{
    use HasFactory;

    protected $table = 'vendorTypeInformation';

    protected $fillable = [
        'name'
    ];
}
