<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\BankAccount
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $bankId
 * @property string $accountNumber
 * @property string $accountHolderName
 * @property string $bankAddress
 * @property int $currencyId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $bank
 * @property-read mixed $currency
 * @method static \Database\Factories\v1\BankAccountFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereVendorId($value)
 * @mixin \Eloquent
 */
class BankAccount extends AbstractModel
{
    use HasFactory;

    protected $table = 'bankAccounts';

    protected $fillable = [
        'userId',
        'vendorId',
        'bankId',
        'accountNumber',
        'accountHolderName',
        'bankAddress',
        'currencyId'
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'bankId',
        'currencyId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'bank',
        'currency'
    ];

    public function getBankAttribute()
    {
        return Bank::find($this->bankId, ['id', 'name']);
    }

    public function getCurrencyAttribute()
    {
        return Currency::find($this->currencyId, ['id', 'code', 'name', 'symbol']);
    }
}
