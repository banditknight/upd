<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementVendorSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'AnnouncementVendor');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => 1,
                'vendorId' => 1,
                'title' => $data[0],
                'description' => $data[1],

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        DB::table('announcementVendors')->insert($dataSeeder);
    }
}
