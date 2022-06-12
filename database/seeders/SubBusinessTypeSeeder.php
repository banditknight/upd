<?php

namespace Database\Seeders;

use App\Models\v1\SubBusinessType;
use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class SubBusinessTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'SubBusiness');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!is_numeric($data[0])) {
                continue;
            }

            $dataSeeder[] = [
                'businessTypeId' => $data[0],
                'code' => $data[1],
                'name' => $data[2]
            ];
        }

        DB::table('subBusinessTypes')->insert($dataSeeder);
    }
}
