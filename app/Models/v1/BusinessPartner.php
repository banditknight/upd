<?php

namespace App\Models\v1;

/**
 * App\Models\v1\BusinessPartner
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessPartner whereUpdatedAt($value)
 */
class BusinessPartner extends AbstractModel
{
    protected $table = 'businessPartners';
}
