<?php

namespace Database\Factories\v1;

use App\Models\v1\BusinessPermitType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessPermitTypeFactory extends Factory
{
    protected $model = BusinessPermitType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
