<?php

namespace Database\Seeders;

use App\Models\v1\Bank;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BankSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Bank');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $code = $data[0];
            $name = $data[1];

            $dataSeeder[] = [
                'code' => $code,
                'name' => $name
            ];
        }

        DB::table('banks')->insert($dataSeeder);
    }
}
