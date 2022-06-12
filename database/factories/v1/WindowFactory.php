<?php

namespace Database\Factories\v1;

use App\Models\v1\Window;
use Illuminate\Database\Eloquent\Factories\Factory;

class WindowFactory extends Factory
{
    protected $model = Window::class;

    public function definition(): array
    {
    	return [
            'organizationId' => 1,
            'name' => 'Profile',
            'description' => 'Profile',
            'title' => 'Profile'
    	];
    }
}
