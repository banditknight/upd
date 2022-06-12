<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TaxDocument
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $taxDocumentTypeId
 * @property string $number
 * @property int $issuedDate
 * @property string $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $issued_date
 * @method static \Database\Factories\v1\TaxDocumentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereIssuedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereTaxDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxDocument whereVendorId($value)
 * @mixin \Eloquent
 * @property-read mixed $tax_document_type
 */
class TaxDocument extends AbstractModel
{
    use HasFactory;

    protected $table = 'taxDocuments';

    protected $fillable = [
        'userId',
        'vendorId',
        'taxDocumentTypeId',
        'number',
        'issuedDate',
        'attachment',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'taxDocumentTypeId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'taxDocumentType'
    ];

    public function setIssuedDateAttribute($value)
    {
        $this->attributes['issuedDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getTaxDocumentTypeAttribute()
    {
        return TaxDocumentType::find($this->taxDocumentTypeId);
    }
}
