<?php

namespace Database\Factories\v1;

use App\Models\v1\ToolOwnerType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToolOwnerTypeFactory extends Factory
{
    protected $model = ToolOwnerType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
