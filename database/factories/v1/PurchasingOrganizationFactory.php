<?php

namespace Database\Factories\v1;

use App\Models\v1\PurchasingOrganization;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchasingOrganizationFactory extends Factory
{
    protected $model = PurchasingOrganization::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name,
    	];
    }
}
