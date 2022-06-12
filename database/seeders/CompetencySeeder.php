<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetencySeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Competency');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorId' => $data[0],
                'userId' => $data[1],
                'businessTypeId' => $data[2],
                'subBusinessTypeId' => $data[3],
                'descriptionOfExperience' => $data[4],
                'vendorTypeId' => $data[5]
            ];
        }

        DB::table('competencies')->insert($dataSeeder);
    }
}
