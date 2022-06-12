<?php

namespace Database\Seeders;

use App\Models\v1\ToolOwnerType;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolOwnerTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'ToolOwnerType');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[0] || !$data[1]) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[0],
                'name' => $data[1]
            ];
        }

        DB::table('toolOwnerTypes')->insert($dataSeeder);
    }
}
