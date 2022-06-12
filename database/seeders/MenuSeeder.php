<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Menu');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }
            $dataSeeder[] = [
                'value' => $data[1],
                'name' => $data[2],
                'description' => $data[3],
                'isParent' => $data[4],
                'parentId' => $data[5],
                'menuActionId' => $data[6],
                'menuActionValue' => $data[7],
                'isActive' => $data[8],
                'sequence' => $data[9],
                'icon' => $data[10],
            ];
        }

        DB::table('menus')->insert($dataSeeder);
    }
}
