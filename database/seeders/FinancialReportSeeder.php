<?php

namespace Database\Seeders;

use App\Models\v1\FinancialReport;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialReportSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'FinancialReport');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'name' => $data[0]
            ];
        }

        DB::table('financialReports')->insert($dataSeeder);
    }
}
