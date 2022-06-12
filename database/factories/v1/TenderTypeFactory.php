<?php

namespace Database\Factories\v1;

use App\Models\v1\TenderType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenderTypeFactory extends Factory
{
    protected $model = TenderType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
