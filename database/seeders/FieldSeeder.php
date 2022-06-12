<?php

namespace Database\Seeders;

use App\Models\v1\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Field::factory()->count(4)->create()->each(function($item, $key) {
            if ($key === 0) {
                $item->fieldTypeId = 1;
                $item->tabId = 1;
            }

            if ($key === 1) {
                $item->fieldTypeId = 2;
                $item->tabId = 1;
            }

            if ($key === 2) {
                $item->fieldTypeId = 3;
                $item->tabId = 2;
            }

            if ($key === 3) {
                $item->fieldTypeId = 4;
                $item->tabId = 3;
            }

            $item->save();
        });
    }
}
