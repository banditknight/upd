<?php

namespace Database\Factories\v1;

use App\Models\v1\CertificationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationTypeFactory extends Factory
{
    protected $model = CertificationType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
