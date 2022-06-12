<?php

namespace Database\Seeders;

use App\Models\v1\UserManual;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserManualSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'UserGuide');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[0] && !$data[1]) {
                continue;
            }

            $dataSeeder[] = [
                'title' => $data[0],
                'content' => $data[1]
            ];
        }

        DB::table('userManuals')->insert($dataSeeder);
    }
}
