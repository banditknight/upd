<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareHolderSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'ShareHolder');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => $data[0],
                'vendorId' => $data[1],
                'name' => $data[2],
                'nationalityId' => $data[3],
                'sharePercentage' => $data[4],

                'taxIdentificationNumber' => random_int(100000, 1000000),
                'taxIdentificationAttachment' => random_int(100000, 1000000),
                'ktpNumber' => random_int(100000, 1000000),
                'ktpAttachment' => random_int(100000, 1000000),
                'kitasNumber' => random_int(100000, 1000000),
                'kitasAttachment' => random_int(100000, 1000000),
            ];
        }

        DB::table('shareHolders')->insert($dataSeeder);
    }
}
