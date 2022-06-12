<?php

namespace Database\Seeders;

use App\Models\v1\TenderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenderTypes')->insert([
            'name' => 'Lelang Terbuka',
        ]);    
        DB::table('tenderTypes')->insert([
            'name' => 'Lelang Tertutup',
        ]);    
    }
}
