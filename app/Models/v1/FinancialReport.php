<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\FinancialReport
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\FinancialReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialReport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FinancialReport extends AbstractModel
{
    use HasFactory;

    protected $table = 'financialReports';

    protected $fillable = [
        'name'
    ];
}
