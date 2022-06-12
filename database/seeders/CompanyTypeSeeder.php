<?php

namespace Database\Seeders;

use App\Models\v1\CompanyType;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'CompanyType');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2],
                'domainId' => 1,
            ];
        }

        DB::table('companyTypes')->insert($dataSeeder);
    }
}
