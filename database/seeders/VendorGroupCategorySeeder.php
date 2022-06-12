<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorGroupCategorySeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'VendorGroupCategory');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorGroupClassificationId' => $data[1],
                'code' => $data[2],
                'description' => $data[3]
            ];
        }

        DB::table('vendorGroupCategories')->insert($dataSeeder);
    }
}
