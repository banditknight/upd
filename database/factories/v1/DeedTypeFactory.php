<?php

namespace Database\Factories\v1;

use App\Models\v1\DeedType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeedTypeFactory extends Factory
{
    protected $model = DeedType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence
    	];
    }
}
