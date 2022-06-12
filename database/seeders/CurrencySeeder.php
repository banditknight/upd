<?php

namespace Database\Seeders;

use App\Models\v1\Currency;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Currency');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2],
                'symbol' => $data[3],
            ];
        }

        DB::table('currencies')->insert($dataSeeder);
    }
}
