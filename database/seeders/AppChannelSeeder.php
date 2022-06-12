<?php

namespace Database\Seeders;

use App\Models\v1\AppChannel;
use Illuminate\Database\Seeder;

class AppChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppChannel::factory()->create([
            'name' => 'web'
        ]);
    }
}
