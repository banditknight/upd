<?php

namespace Database\Factories\v1;

use App\Models\v1\SubBusinessType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubBusinessTypeFactory extends Factory
{
    protected $model = SubBusinessType::class;

    public function definition(): array
    {
    	return [
            'businessTypeId' => 1,
            'name' => $this->faker->name,
    	];
    }
}
