<?php

namespace Database\Seeders;

use App\Models\v1\FieldType;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldType::factory()->count(4)->create()->each(function($item, $key) {
            if ($key === 0) {
                $item->code = 'TEXT';
                $item->name = 'text';
            }

            if ($key === 1) {
                $item->code = 'NUMBER';
                $item->name = 'number';
            }

            if ($key === 2) {
                $item->code = 'SELECT_STATIC';
                $item->name = 'select';
            }

            if ($key === 3) {
                $item->code = 'SELECT_DYNAMIC';
                $item->name = 'select';
            }

            $item->save();
        });
    }
}
