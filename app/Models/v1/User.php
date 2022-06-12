<?php

namespace App\Models\v1;

use App\Models\MailableInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\v1\User
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property bool $isActive
 * @method static \Database\Factories\v1\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $resetPasswordToken
 * @property int|null $resetPasswordExpired
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResetPasswordExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResetPasswordToken($value)
 * @property int|null $vendorId
 * @property int|null $isPrimary
 * @property-read mixed $role
 * @property-read mixed $vendor
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVendorId($value)
 */
class User extends AbstractModel implements AuthenticatableContract, AuthorizableContract, JWTSubject, MailableInterface
{
    use Authenticatable, Authorizable, HasFactory, HasRoles;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'createdAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';

    /** @var string $accessToken */
    protected $accessToken;

    /** @var int $expiredIn */
    protected $expiredIn;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
        'isPrimary',
        'vendorId',
        'code',
        'departmentId',
        'attachment',
        'jobTitleId',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'departmentId',
        'created_at',
        'updated_at',
        'jobTitleId',
    ];

    protected $appends = [
        'vendor',
        'role',
        'roleId',
        'department',
        'jobTitle',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function resetPasswordToken()
    {
        return $this->belongsTo(ResetPasswordToken::class, 'userId')
            ->where('isActive', '=', 1);
    }

    /**
     * @return int
     */
    public function getExpiredIn(): int
    {
        return $this->expiredIn;
    }

    /**
     * @param int $expiredIn
     */
    public function setExpiredIn(int $expiredIn): void
    {
        $this->expiredIn = $expiredIn;
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public function toEmailAddress(): string
    {
        return $this->email;
    }

    public function toCcEmailAddress(): string
    {
        return '';
    }

    public function getVendorAttribute()
    {
        return $this->belongsTo(Vendor::class, 'vendorId')->first();
    }

    public function getRoleAttribute()
    {
        return $this->getRoleNames();
    }

    public function getRoleIdAttribute()
    {
        $roles = $this->belongsToMany(SpatieRole::class,'spatieModelHasRoles','model_id','role_id')->first();
        if($roles){
            return $roles->id;
        }
        return null;
    }

    public function getDepartmentAttribute()
    {
        return $this->belongsTo(Department::class, 'departmentId')->first();
    }

    public function isSuperAdmin(){
        return $this->hasRole('superAdmin');
    }

    public function getJobTitleAttribute(){
        return JobTitle::find($this->jobTitleId);
    }
}
