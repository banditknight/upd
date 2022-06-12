<?php

namespace Database\Factories\v1;

use App\Models\v1\Experience;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition(): array
    {
    	return [
            'userId' => 1,
            'vendorId' => 1,
            'businessTypeId' => 1,
            'subBusinessTypeId' => 1,
            'workPackageName' => $this->faker->sentence,
            'workPackageLocation' => 'BSD City',
            'contactOwner' => 'Suherman Atqiya',
            'address' => 'BSD City',
            'countryId' => 1,
            'provinceId' => 1,
            'cityId' => 1,
            'districtId' => 1,
            'postalCode' => '12140',
            'contactPerson' => 'Suherman Atqiya',
            'phoneNumber' => '6285848448707',
            'contractNumber' => '1234567/NA/NI/NU',
            'validFromDate' => Carbon::now()->format('d-m-Y'),
            'validThruDate' => Carbon::now()->format('d-m-Y'),
            'currencyId' => 1,
            'contractValue' => 100000000,
            'contractHandOverLetterDate' => Carbon::now()->format('d-m-Y'),
            'contractHandOverLetterNumber' => 12345,
            'contractHandOverLetterAttachment' => 1,
            'testimony' => $this->faker->sentence,
            'testimonyAttachment' => 1,
    	];
    }
}
