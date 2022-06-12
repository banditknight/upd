<?php

namespace Database\Factories\v1;

use App\Models\v1\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    protected $model = Bank::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
            'code' => $this->faker->sentence,
    	];
    }
}
