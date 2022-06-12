<?php

namespace Database\Factories\v1;

use App\Models\v1\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition(): array
    {
    	return [
            'symbol' => $this->faker->currencyCode,
            'countryId' => 1,
    	];
    }
}
