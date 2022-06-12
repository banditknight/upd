<?php

namespace Database\Seeders;

use App\Models\v1\Sanction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SanctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sanction::factory()->create([
            'vendorId' => 1,
            'sanctionTypeId' => 3,
            'description' => 'Pelanggaran pada tender id TD1000225. vendor tidak dapat menyelesaikan pekerjaan.',
            'issuedDate' => Carbon::now()->timestamp,
            'expiredDate' => Carbon::now()->timestamp,
            'actionId' => 1,
        ]);
    }
}
