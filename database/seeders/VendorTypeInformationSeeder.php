<?php

namespace Database\Seeders;

use App\Models\v1\VendorTypeInformation;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorTypeInformationSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'VendorType');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[1] || !$data[2]) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2]
            ];
        }

        DB::table('vendorTypeInformation')->insert($dataSeeder);
    }
}
