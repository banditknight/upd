<?php

namespace Database\Factories\v1;

use App\Models\v1\Field;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    protected $model = Field::class;

    public function definition(): array
    {
    	return [
            'fieldTypeId' => 1,
            'tabId' => 1,
            'label' => $this->faker->sentence,
            'name' => random_int(0, 1) ? 'text' : 'number',
            'description' => $this->faker->sentence,
            'placeholder' => $this->faker->sentence,
            'index' => 1,
    	];
    }
}
