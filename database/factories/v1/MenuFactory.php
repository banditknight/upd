<?php

namespace Database\Factories\v1;

use App\Models\v1\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition(): array
    {
    	return [
            'value' => $this->faker->sentence,
            'name' => $this->faker->sentence,
            'menuActionId' => 1,
            'menuActionValue' => 1,

            'description' => $this->faker->sentence,
            'isParent' => 1,

            'isActive' => 1,
    	];
    }
}
