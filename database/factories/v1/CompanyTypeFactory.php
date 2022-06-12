<?php

namespace Database\Factories\v1;

use App\Models\v1\CompanyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyTypeFactory extends Factory
{
    protected $model = CompanyType::class;

    public function definition(): array
    {
    	return [
    	    'name' => $this->faker->name()
    	];
    }
}
