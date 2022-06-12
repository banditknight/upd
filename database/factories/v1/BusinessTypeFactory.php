<?php

namespace Database\Factories\v1;

use App\Models\v1\BusinessType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessTypeFactory extends Factory
{
    protected $model = BusinessType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
