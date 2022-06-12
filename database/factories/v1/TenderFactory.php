<?php

namespace Database\Factories\v1;

use App\Models\v1\Tender;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenderFactory extends Factory
{
    protected $model = Tender::class;

    public function definition(): array
    {
    	return [
            'number' => $this->faker->creditCardNumber,
            'name' => $this->faker->name,
            'purchasingOrganizationId' => 1,
            'scopeOfWorkId' => 1,
            'tenderTypeId' => 1,
            'tenderDetailId' => 1,
            'bidSubmissionMethodId' => 1,
            'fromDate' => \Carbon\Carbon::now()->addDays(20)->format('d-m-Y'),
            'toDate' => \Carbon\Carbon::now()->addDays(27)->format('d-m-Y'),
            'registrationFromDate' => \Carbon\Carbon::now()->format('d-m-Y'),
            'registrationToDate' => \Carbon\Carbon::now()->addDays(7)->format('d-m-Y'),
            'preQualificationFromDate' => \Carbon\Carbon::now()->addDays(10)->format('d-m-Y'),
            'preQualificationToDate' => \Carbon\Carbon::now()->addDays(17)->format('d-m-Y'),
            'sectorId' => 1,
    	];
    }
}
