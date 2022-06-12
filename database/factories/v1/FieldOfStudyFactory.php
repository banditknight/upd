<?php

namespace Database\Factories\v1;

use App\Models\v1\FieldOfStudy;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldOfStudyFactory extends Factory
{
    protected $model = FieldOfStudy::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
