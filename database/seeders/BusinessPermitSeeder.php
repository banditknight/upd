<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessPermitSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'BusinessPermit');

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
                'businessPermitTypeId' => $data[2],
                'attachment' => 1,
                'number' => $data[3],
                'validFromDate' => $data[4],
                'validThruDate' => $data[5],
                'issuedBy' => $data[6],
                'otherBusinessPermitType' => $data[7] ?? null,
            ];
        }

        DB::table('businessPermits')->insert($dataSeeder);
    }
}
