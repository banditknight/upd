<?php

namespace Database\Factories\v1;

use App\Models\v1\VendorTypeInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorTypeInformationFactory extends Factory
{
    protected $model = VendorTypeInformation::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
