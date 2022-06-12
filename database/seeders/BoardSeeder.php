<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'CompanyStructure');

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
                'boardTypeId' => $data[2],
                'nationalityId' => $data[3],
                'isListed' => $data[4],
                'isCompanyHead' => $data[5],
                'name' => $data[6],
                'position' => $data[7],
                'taxIdentificationNumber' => $data[8],
                'taxIdentificationAttachment' => 1,
                'ktpNumber' => $data[9],
                'ktpAttachment' => 2,
                'kitasNumber' => $data[10],
                'kitasAttachment' => 3,
            ];
        }

        DB::table('boards')->insert($dataSeeder);
    }
}
