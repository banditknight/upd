<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class RoleMenuSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'RoleMenu');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }
            $dataSeeder[] = [
                'roleId' => $data[0],
                'menuId' => $data[1],
                'isReadOnly' => $data[2],
            ];
        }

        DB::table('roleMenus')->insert($dataSeeder);
    }
}
