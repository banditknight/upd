<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanctionTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'SanctionTypes');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[0],
                'name' => $data[1],
                'description' => $data[2],
                'score' => $data[3],
            ];
        }

        DB::table('sanctionTypes')->insert($dataSeeder);
    }
}
