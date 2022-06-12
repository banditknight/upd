<?php

namespace Database\Seeders;

use App\Models\v1\EmployeeStatus;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeStatusSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Employee');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1] ?? 'HARDCODED',
                'name' => strtoupper($data[2])
            ];
        }

        DB::table('employeeStatuses')->insert($dataSeeder);
    }
}
