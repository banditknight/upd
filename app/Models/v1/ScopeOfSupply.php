<?php

namespace App\Models\v1;

/**
 * App\Models\v1\ScopeOfSupply
 *
 * @property int $id
 * @property int $purchasingGroupId
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply wherePurchasingGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfSupply whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ScopeOfSupply extends AbstractModel
{
    protected $table = 'scopeOfSupplies';
}
