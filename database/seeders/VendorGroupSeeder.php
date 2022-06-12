<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorGroupSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'VendorGroup');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorGroupCategoryId' => $data[0],
                'code' => $data[1],
                'description' => $data[2],
            ];
        }

        DB::table('vendorGroups')->insert($dataSeeder);
    }
}
