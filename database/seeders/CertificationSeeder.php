<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificationSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Certification');

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
                'certificationTypeId' => $data[2],
                'description' => $data[3],
                'validFrom' => $this->dateToTimestamp($data[4]),
                'validThruDate' => $this->dateToTimestamp($data[5]),
                'attachment' => $data[6],
            ];
        }

        DB::table('certifications')->insert($dataSeeder);
    }
}
