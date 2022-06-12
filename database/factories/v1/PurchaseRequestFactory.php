<?php

namespace Database\Factories\v1;

use App\Models\v1\PurchaseRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseRequestFactory extends Factory
{
    protected $model = PurchaseRequest::class;

    public function definition(): array
    {
    	return [
            'no' => $this->faker->numberBetween(1000, 5000),
            'name' => $this->faker->sentence,
            'document' => $this->faker->sentence,
            'departmentId' => 1,
            'itemTypeId' => 1,
            'currencyId' => 1,
            'woNo' => 1,
            'woTitle' => 'ABC',
    	];
    }
}
