<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\CertificationType
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\CertificationTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CertificationType extends AbstractModel
{
    use HasFactory;

    protected $table = 'certificationTypes';

    protected $fillable = [
        'code',
        'name'
    ];
}
