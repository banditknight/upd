<?php

namespace Database\Factories\v1;

use App\Models\v1\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectorFactory extends Factory
{
    protected $model = Sector::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name
    	];
    }
}
