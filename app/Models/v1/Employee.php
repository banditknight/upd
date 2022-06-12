<?php

namespace App\Models\v1;

use Carbon\Carbon;

/**
 * App\Models\v1\Employee
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $employeeStatusId
 * @property int $dob
 * @property string $pob
 * @property string $name
 * @property string $educationId
 * @property string $fieldOfStudy
 * @property string $ktpNumber
 * @property string $jobExperienceAttachment
 * @property string $workPeriodId
 * @property string $certificateAttachment
 * @property int $certificateTypeId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCertificateAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCertificateTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEducationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmployeeStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJobExperienceAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereKtpNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWorkPeriodId($value)
 * @mixin \Eloquent
 * @property int $fieldOfStudyId
 * @property-read mixed $certificate_type
 * @property-read mixed $education
 * @property-read mixed $employee_status
 * @property-read mixed $field_of_study
 * @property-read mixed $work_period
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFieldOfStudyId($value)
 */
class Employee extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'employeeStatusId',
        'dob',
        'pob',
        'name',
        'educationId',
        'fieldOfStudyId',
        'ktpNumber',
        'jobExperienceAttachment',
        'workPeriodId',
        'certificateAttachment',
        'certificateTypeId'
    ];

    protected $appends = [
        'fieldOfStudy',
        'employeeStatus',
        'education',
        'certificateType',
        'workPeriod'
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'employeeStatusId',
        'educationId',
        'fieldOfStudyId',
        'workPeriodId',
        'certificateTypeId',
        'created_at',
        'updated_at'
    ];

    public function getDobAttribute()
    {
        // return Carbon::createFromTimestamp($this->attributes['dob'])->format('d-m-Y');
        return $this->attributes['dob'];
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getFieldOfStudyAttribute()
    {
        return FieldOfStudy::find($this->fieldOfStudyId);
    }

    public function getEmployeeStatusAttribute()
    {
        return EmployeeStatus::find($this->employeeStatusId);
    }

    public function getEducationAttribute()
    {
        return Education::find($this->educationId);
    }

    public function getCertificateTypeAttribute()
    {
        return CertificationType::find($this->certificateTypeId);
    }

    public function getWorkPeriodAttribute()
    {
        return WorkPeriod::find($this->workPeriodId);
    }
}
