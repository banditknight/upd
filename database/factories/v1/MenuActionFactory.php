<?php

namespace Database\Factories\v1;

use App\Models\v1\MenuAction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuActionFactory extends Factory
{
    protected $model = MenuAction::class;

    public function definition(): array
    {
    	return [
            'code' => $this->faker->sentence,
            'name' => $this->faker->sentence
    	];
    }
}
