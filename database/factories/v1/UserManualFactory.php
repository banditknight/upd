<?php

namespace Database\Factories\v1;

use App\Models\v1\UserManual;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserManualFactory extends Factory
{
    protected $model = UserManual::class;

    public function definition(): array
    {
    	return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->sentence(15),
    	];
    }
}
