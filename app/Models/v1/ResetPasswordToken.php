<?php

namespace App\Models\v1;

/**
 * App\Models\v1\ResetPasswordToken
 *
 * @property int $id
 * @property int $userId
 * @property string $resetPasswordToken
 * @property int $resetPasswordExpired
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereResetPasswordExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereResetPasswordToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUserId($value)
 * @mixin \Eloquent
 * @property string $token
 * @property int $expired
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereToken($value)
 */
class ResetPasswordToken extends AbstractModel
{
    protected $table = 'resetPasswordTokens';

    protected $fillable = [
        'userId',
        'token',
        'expired',
        'isActive'
    ];
}
