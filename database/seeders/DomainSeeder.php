<?php

namespace Database\Seeders;

use App\Models\v1\Domain;
use Database\v1\Factories\DomainFactory;
use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::factory()->create([
            'name' => 'Dalam Negeri',
            'location' => 'Dalam Negeri'
        ]);

        Domain::factory()->create([
            'name' => 'Luar Negeri',
            'location' => 'Luar Negeri'
        ]);
    }
}
