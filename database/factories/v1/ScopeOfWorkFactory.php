<?php

namespace Database\Factories\v1;

use App\Models\v1\ScopeOfWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScopeOfWorkFactory extends Factory
{
    protected $model = ScopeOfWork::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
