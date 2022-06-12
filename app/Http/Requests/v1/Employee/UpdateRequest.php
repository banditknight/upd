<?php

namespace App\Http\Requests\v1\Employee;

use App\Rules\AlphaSpaceDotComma;
use App\Rules\EducationValid;
use App\Rules\EmployeeStatusValid;
use App\Rules\FieldOfStudyValid;
use App\Rules\FileValid;
use App\Rules\WorkPeriodValid;

class UpdateRequest extends \App\Http\Requests\AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'employeeStatusId' => [
                'required',
                'numeric',
                new EmployeeStatusValid()
            ],
            'dob' => [
                'required',
                'date_format:d-m-Y'
            ],
            'pob' => [
                'required',
                'min:5',
                'max:256',
                new AlphaSpaceDotComma()
            ],
            'name' => [
                'required',
                'min:5',
                'max:100',
                new AlphaSpaceDotComma()
            ],
            'educationId' => [
                'required',
                'numeric',
                new EducationValid()
            ],
            'fieldOfStudyId' => [
                'required',
                'numeric',
                new FieldOfStudyValid()
            ],
            'ktpNumber' => [
                'required',
                'numeric',
                'digits_between:16,16',
                sprintf('unique:employees,ktpNumber,%s', $this->modelId())
            ],
            'jobExperienceAttachment' => [
                new FileValid()
            ],
            'workPeriodId' => [
                'required',
                'numeric',
                new WorkPeriodValid()
            ],
            'certificateAttachment' => [
                new FileValid()
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
