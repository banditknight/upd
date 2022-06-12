<?php

namespace Database\Factories\v1;

use App\Models\v1\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->country,
            'code' => $this->faker->countryCode,
            'currencyCode' => $this->faker->currencyCode
    	];
    }
}
