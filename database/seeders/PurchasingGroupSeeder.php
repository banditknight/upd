<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasingGroupSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/ScopeOfSupply.xlsx'), 'PurchasingGroup');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[0]) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[0],
                'name' => $data[1]
            ];
        }

        DB::table('purchasingGroups')->insert($dataSeeder);
    }
}
