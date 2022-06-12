<?php

namespace Database\Factories\v1;

use App\Models\v1\Tab;
use Illuminate\Database\Eloquent\Factories\Factory;

class TabFactory extends Factory
{
    protected $model = Tab::class;

    public function definition(): array
    {
    	return [
            'windowId' => null,
            'tabGroupId' => null,
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'endPoint' => '/bank',
    	];
    }
}
