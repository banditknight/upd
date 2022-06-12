<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\EmployeeStatus
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\EmployeeStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmployeeStatus extends AbstractModel
{
    use HasFactory;

    protected $table = 'employeeStatuses';
}
