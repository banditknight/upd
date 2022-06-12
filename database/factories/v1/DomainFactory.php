<?php

namespace Database\Factories\v1;

use App\Models\v1\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

class DomainFactory extends Factory
{
    protected $model = Domain::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name,
            'location' => $this->faker->country,
    	];
    }
}
