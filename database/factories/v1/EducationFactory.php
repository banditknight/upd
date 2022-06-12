<?php

namespace Database\Factories\v1;

use App\Models\v1\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    protected $model = Education::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
