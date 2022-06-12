<?php

namespace Database\Factories\v1;

use App\Models\v1\ExpiredDocument;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpiredDocumentFactory extends Factory
{
    protected $model = ExpiredDocument::class;

    public function definition(): array
    {
    	return [
            'vendorId' => 1,
            'businessPermitTypeId' => 1,
            'businessPermitNumber' => $this->faker->randomDigit(),
            'validFromDate' => Carbon::now()->format('d-m-Y'),
            'validThruDate' => Carbon::now()->addDays(10)->format('d-m-Y'),
            'stateId' => 1,
    	];
    }
}
