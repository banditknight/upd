<?php

namespace Database\Factories\v1;

use App\Models\v1\TermAndCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

class TermAndConditionFactory extends Factory
{
    protected $model = TermAndCondition::class;

    public function definition(): array
    {
    	return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->sentence(15),
    	];
    }
}
