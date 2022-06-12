<?php

namespace Database\Seeders;

use App\Models\v1\PurchasingOrganization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasingOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchasingOrganizations')->insert([
            'code' => '001',
            'name' => 'KPI Bontang',
        ]);
        DB::table('purchasingOrganizations')->insert([
            'code' => '002',
            'name' => 'KPI Jakarta',
        ]);
    }
}
