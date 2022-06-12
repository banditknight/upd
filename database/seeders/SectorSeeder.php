<?php

namespace Database\Seeders;

use App\Models\v1\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Private'],
            ['name' => 'Public'],
        ];
        Sector::insert($data);
    }
}
