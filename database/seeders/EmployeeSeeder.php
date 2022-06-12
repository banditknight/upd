<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Experts');

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
                'employeeStatusId' => $data[2],
                'dob' => $this->dateToTimestamp($data[3]),
                'pob' => $data[4],
                'name' => $data[5],
                'educationId' => $data[6],
                'fieldOfStudyId' => $data[7],
                'ktpNumber' => $data[8],
                'jobExperienceAttachment' => $data[9],
                'workPeriodId' => $data[10],
                'certificateAttachment' => $data[11],
                'certificateTypeId' => $data[12],
            ];
        }

        DB::table('employees')->insert($dataSeeder);
    }
}
