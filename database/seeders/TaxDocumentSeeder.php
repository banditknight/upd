<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxDocumentSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'TaxDocument');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => $data[0],
                'vendorId' => $data[1],
                'taxDocumentTypeId' => $data[2],
                'number' => $data[3],
                'issuedDate' => $data[4],
                'attachment' => $data[5],
            ];
        }

        DB::table('taxDocuments')->insert($dataSeeder);
    }
}
