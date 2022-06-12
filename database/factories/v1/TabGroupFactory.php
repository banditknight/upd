<?php

namespace Database\Factories\v1;

use App\Models\v1\TabGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class TabGroupFactory extends Factory
{
    protected $model = TabGroup::class;

    public function definition(): array
    {
    	return [
            'windowId' => 1,
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
    	];
    }
}
