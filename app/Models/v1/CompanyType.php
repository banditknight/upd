<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\CompanyType
 *
 * @property int $id
 * @property string $name
 * @property int $domain_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\CompanyTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $code
 * @property int $domainId
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereCode($value)
 * @property-read mixed $domain
 */
class CompanyType extends AbstractModel
{
    use HasFactory;

    protected $table = 'companyTypes';

    protected $fillable = [
        'code',
        'name',
        'domainId'
    ];

    protected $hidden = [
        'domainId',
        'updated_at',
        'created_at'
    ];

    public function getDomainAttribute()
    {
        return Domain::find($this->domainId);
    }
}
