<?php

namespace Database\Seeders;

use App\Models\v1\User;
use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'code' => 'U001',
            'name' => 'Administrator',
            'address' => 'Jl Sudirman 5',
            'phone' => '08123456781',
            'email' => 'eproc@kpi.co.id',
            'password' => app('hash')->make('eproc2022'),
            'vendorId' => 1,
            'isPrimary' => true,
            'jobTitleId' => 2,
        ]);

        DB::table('users')->insert([
            'code' => 'U002',
            'name' => 'Procurement 1',
            'address' => 'Jl Sudirman 5',
            'phone' => '08123456780',
            'email' => 'procurement1@kpi.co.id',
            'password' => app('hash')->make('proc1@2022'),
            'vendorId' => 1,
            'jobTitleId' => 3,
        ]);

        DB::table('users')->insert([
            'code' => 'U003',
            'name' => 'Procurement 2',
            'address' => 'Jl Sudirman 5',
            'phone' => '08123456782',
            'email' => 'producrement2@kpi.co.id',
            'password' => app('hash')->make('proc1@2022'),
            'vendorId' => 1,
            'jobTitleId' => 1,
        ]);

        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'PersonInCharge');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorId' => $data[0],
                'name' => $data[2],
                'address' => $data[4],
                'phone' => $data[6],
                'code' => $data[7],
                'email' => $data[3],
                'password' => app('hash')->make($data[5]),
            ];
        }

        DB::table('users')->insert($dataSeeder);

        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Admin');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorId' => $data[0],
                'name' => $data[2],
                'address' => $data[4],
                'phone' => $data[6],
                'code' => $data[7],
                'email' => $data[3],
                'password' => app('hash')->make($data[5]),
            ];
        }

        DB::table('users')->insert($dataSeeder);

        Role::findByName('superAdmin')->users()->sync(User::where('id', '=', 1)->pluck('id'));
        Role::findByName('vendor')->users()->sync(User::where('id', '>', 1)->where('id', '<', 14)->pluck('id'));

        Role::findByName('buyer')->users()->sync(User::where('id', '=', 14)->pluck('id'));
        Role::findByName('superVisor')->users()->sync(User::where('id', '=', 15)->pluck('id'));
        Role::findByName('superIntendent')->users()->sync(User::where('id', '=', 16)->pluck('id'));
        Role::findByName('manager')->users()->sync(User::where('id', '=', 17)->pluck('id'));
        Role::findByName('generalManager')->users()->sync(User::where('id', '=', 18)->pluck('id'));
        Role::findByName('vicePresidentDirector')->users()->sync(User::where('id', '=', 19)->pluck('id'));
        Role::findByName('buyer')->users()->sync(User::where('id', '=', 20)->pluck('id'));

        // DB::table('users')->insert([
        //     'code' => 'U100',
        //     'name' => 'Admin Procurement',
        //     'address' => 'Fill with admin Procurement Address',
        //     'phone' => '08123456783',
        //     'email' => 'eproc@sentralnusa.com',
        //     'password' => app('hash')->make('eproc123'),
        //     'vendorId' => 2
        // ]);
        // Role::findByName('superAdmin')->users()->sync(User::where('id', '=', 21)->pluck('id'));

    }
}
