<?php

namespace Database\Factories\v1;

use App\Models\v1\BoardType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardTypeFactory extends Factory
{
    protected $model = BoardType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
