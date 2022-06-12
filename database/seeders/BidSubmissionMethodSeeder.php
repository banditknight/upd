<?php

namespace Database\Seeders;

use App\Models\v1\BidSubmissionMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidSubmissionMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidSubmissionMethods')->insert([
            'code' => '001',
            'name' => '1 Sampul',
        ]);
        DB::table('bidSubmissionMethods')->insert([
            'code' => '002',
            'name' => '2 Sampul',
        ]);
        DB::table('bidSubmissionMethods')->insert([
            'code' => '003',
            'name' => '2 Tahap',
        ]);
    }
}
