<?php

namespace Database\Factories\v1;

use App\Models\v1\Reference;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenceFactory extends Factory
{
    protected $model = Reference::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
