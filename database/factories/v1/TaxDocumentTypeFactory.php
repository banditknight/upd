<?php

namespace Database\Factories\v1;

use App\Models\v1\TaxDocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxDocumentTypeFactory extends Factory
{
    protected $model = TaxDocumentType::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
