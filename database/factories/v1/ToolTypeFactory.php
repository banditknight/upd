<?php

namespace Database\Factories\v1;

use App\Models\v1\ToolType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToolTypeFactory extends Factory
{
    protected $model = ToolType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
