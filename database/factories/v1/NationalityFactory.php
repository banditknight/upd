<?php

namespace Database\Factories\v1;

use App\Models\v1\Nationality;
use Illuminate\Database\Eloquent\Factories\Factory;

class NationalityFactory extends Factory
{
    protected $model = Nationality::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
