<?php

namespace Database\Seeders;

use App\Models\v1\Tab;
use Illuminate\Database\Seeder;

class TabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tab::factory()->count(4)->create()->each(function ($item, $key) {

            if ($key === 0) {
                $item->windowId = null;
                $item->tabGroupId = 1;
            }

            if ($key === 1) {
                $item->windowId = null;
                $item->tabGroupId = 1;
            }

            if ($key === 2) {
                $item->windowId = null;
                $item->tabGroupId = 2;
            }

            if ($key === 3) {
                $item->windowId = null;
                $item->tabGroupId = 2;
            }

            $item->save();
        });
    }
}
