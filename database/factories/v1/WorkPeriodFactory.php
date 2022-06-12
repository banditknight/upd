<?php

namespace Database\Factories\v1;

use App\Models\v1\WorkPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkPeriodFactory extends Factory
{
    protected $model = WorkPeriod::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence
    	];
    }
}
