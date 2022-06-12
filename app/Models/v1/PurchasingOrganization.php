<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\PurchasingOrganization
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property int $isactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\PurchasingOrganizationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereIsactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasingOrganization whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchasingOrganization extends AbstractModel
{
    use HasFactory;

    protected $table = 'purchasingOrganizations';

    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
