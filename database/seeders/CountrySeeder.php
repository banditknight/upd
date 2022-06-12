<?php

namespace Database\Seeders;

use App\Models\v1\Country;
use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    use ExcelReader;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Country::factory()->create([
        //     'name' => 'Indonesia',
        //     'code' => 'ID',
        //     'currencyCode' => 'Rp.'
        // ]);
        // Country::factory()->count(10)->create();

        // $now = Carbon::now();
        // $csv = new CsvtoArray();
        // $file = __DIR__.'/../../resources/csv/countries.csv';
        // $header = ['namr', 'code', 'currencyCode'];
        // $data = $csv->csv_to_array($file, $header);
        // $data = array_map(function ($arr) use ($now) {
        //     $arr['meta'] = json_encode(['lat' => $arr['lat'], 'long' => $arr['long']]);
        //     unset($arr['lat'], $arr['long']);

        //     return $arr + ['created_at' => $now, 'updated_at' => $now];
        // }, $data);

        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Country');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[3],
                'name' => $data[4],
                'currencyId' => $data[6]
            ];
        }


        DB::table(config('volt.indonesia.table_prefix').'countries')->insert($dataSeeder);

    }
}
