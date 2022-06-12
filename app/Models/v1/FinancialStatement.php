<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\FinancialStatement
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $financialStatementDate
 * @property string $financialReport
 * @property string $publicAccountantFullName
 * @property int $year
 * @property int $currencyId
 * @property int $currentAssets
 * @property int $nonCurrentAssets
 * @property int $otherAssets
 * @property int $currentPayable
 * @property int $otherPayable
 * @property int $paidInCapital
 * @property int $retainedEarning
 * @property int $annualRevenue
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $financial_statement_date
 * @method static \Database\Factories\v1\FinancialStatementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereAnnualRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereCurrentAssets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereCurrentPayable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereFinancialReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereFinancialStatementDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereNonCurrentAssets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereOtherAssets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereOtherPayable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement wherePaidInCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement wherePublicAccountantFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereRetainedEarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereYear($value)
 * @mixin \Eloquent
 * @property int $financialReportId
 * @property-read mixed $currency
 * @property-read mixed $financial_report
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialStatement whereFinancialReportId($value)
 */
class FinancialStatement extends AbstractModel
{
    use HasFactory;

    protected $table = 'financialStatements';

    protected $fillable = [
        'userId',
        'vendorId',
        'financialStatementDate',
        'financialReportId',
        'publicAccountantFullName',
        'year',
        'currencyId',
        'currentAssets',
        'nonCurrentAssets',
        'otherAssets',
        'currentPayable',
        'otherPayable',
        'paidInCapital',
        'retainedEarning',
        'annualRevenue',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'financialReportId',
        'currencyId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'financialReport',
        'currency'
    ];

    public function getFinancialStatementDateAttribute()
    {
        return Carbon::createFromTimestamp($this->attributes['financialStatementDate'])->format('d-m-Y');
    }

    public function setFinancialStatementDateAttribute($value)
    {
        $this->attributes['financialStatementDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getCurrencyAttribute()
    {
        return Currency::find($this->currencyId)->only(['id', 'code', 'name']);
    }

    public function getFinancialReportAttribute()
    {
        return FinancialReport::find($this->financialReportId);
    }
}
