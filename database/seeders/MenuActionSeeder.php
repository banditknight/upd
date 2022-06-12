<?php

namespace Database\Seeders;

use App\Models\v1\MenuAction;
use Illuminate\Database\Seeder;

class MenuActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuAction::factory()->count(3)->create()->each(function($item, $key) {
            if ($key === 0) {
                $item->code = 'WINDOW';
                $item->name = 'Window';
            }

            if ($key === 1) {
                $item->code = 'CUSTOM_PAGE';
                $item->name = 'Custom Page';
            }

            if ($key === 2) {
                $item->code = 'PROCESS';
                $item->name = 'Process';
            }

            if ($key === 3) {
                $item->code = 'REPORT';
                $item->name = 'Report';
            }

            $item->save();
        });
    }
}
