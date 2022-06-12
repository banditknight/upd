<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderRequirementDocument
 *
 * @property int $id
 * @property int $tenderId
 * @property string $name
 * @property int $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $description
 * @property int $stepType
 * @property int $isMandatory
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereIsMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderRequirementDocument whereStepType($value)
 */
class TenderRequirementDocument extends AbstractModel
{
    protected $table = 'tenderRequirementDocuments';

    protected $fillable = [
        'tenderId',
        'name',
        'attachment',
        'stepType',
        'isMandatory',
        'praQualification',
        'technical',
        'commercial',
        'description',
    ];

    protected $hidden = [
        'praQualification',
        'technical',
        'commercial',
        'created_at',
        'updated_at'
    ];
}
