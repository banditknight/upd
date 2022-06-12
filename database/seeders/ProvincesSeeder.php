<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Seeds\CsvtoArray;

class ProvincesSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $csv = new CsvtoArray();
        $file = __DIR__.'/../../resources/csv/provinces.csv';
        $header = ['id', 'name', 'lat', 'long'];
        $data = $csv->csv_to_array($file, $header);
        $data = array_map(function ($arr) use ($now) {
            $arr['meta'] = json_encode(['lat' => $arr['lat'], 'long' => $arr['long']]);
            unset($arr['lat'], $arr['long']);

            return $arr + ['created_at' => $now, 'updated_at' => $now];
        }, $data);

        DB::table(config('volt.indonesia.table_prefix').'provinces')->insert($data);
    }
}
