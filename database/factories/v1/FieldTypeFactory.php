<?php

namespace Database\Factories\v1;

use App\Models\v1\FieldType;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldTypeFactory extends Factory
{
    protected $model = FieldType::class;

    public function definition(): array
    {
    	return [
            'code' => $this->faker->sentence,
            'name' => $this->faker->sentence,
    	];
    }
}
