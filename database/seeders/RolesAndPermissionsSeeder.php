<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = [
            'approveCbe',
            'approveTbe',
            'accessBackOffice',
            'editRole',
            'editPermission',
            'editRoleHasPermission',
            'approveTenderLevelOne',
            'approveTenderLevelTwo',
            'approveTenderLevelThree',
            'approveTenderLevelFour',
            'approveTenderLevelFive',
            'approveTenderLevelSix',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'api'];
        });

        Permission::insert($permissions->toArray());

        // create roles and assign created permissions
        // $arrayOfRoles = [
        //     'superAdmin',
        //     'admin',
        //     'buyer',
        //     'superVisor',
        //     'superIntendent',
        //     'manager',
        //     'generalManager',
        //     'vicePresidentDirector',
        //     'vendor'
        // ];

        // $roles = collect($arrayOfRoles)->map(function ($role) {
        //     return ['name' => $role, 'guard_name' => 'api','code' => $role,'description' => $role];
        // });

        // Role::insert($roles->toArray());
        
        $arrayOfRoles = [
            ['code'=>'SA','name'=>'superAdmin','description'=>'Super Admin','guard_name'=>'api'],
            ['code'=>'ADM','name'=>'admin','description'=>'Admin','guard_name'=>'api'],
            ['code'=>'BYR','name'=>'buyer','description'=>'Buyer','guard_name'=>'api'],
            ['code'=>'USR','name'=>'user','description'=>'User','guard_name'=>'api'],
            ['code'=>'SPV','name'=>'superVisor','description'=>'Supervisor','guard_name'=>'api'],
            ['code'=>'SPI','name'=>'superIntendent','description'=>'Superintendent','guard_name'=>'api'],
            ['code'=>'MGR','name'=>'manager','description'=>'Manager','guard_name'=>'api'],
            ['code'=>'GM','name'=>'generalManager','description'=>'General Manager','guard_name'=>'api'],
            ['code'=>'VPD','name'=>'vicePresidentDirector','description'=>'Vice President Director','guard_name'=>'api'],
            ['code'=>'VND','name'=>'vendor','description'=>'Vendor','guard_name'=>'api'],
        ];

        Role::insert($arrayOfRoles);

        $arrayOfRoleHasPermissions = [
            [
                'permission_id' => 1,
                'role_id' => 1
            ],
            [
                'permission_id' => 2,
                'role_id' => 1
            ],
            [
                'permission_id' => 3,
                'role_id' => 1
            ],
            [
                'permission_id' => 4,
                'role_id' => 1
            ],
            [
                'permission_id' => 5,
                'role_id' => 1
            ],
            [
                'permission_id' => 6,
                'role_id' => 1
            ],
            [
                'permission_id' => 7,
                'role_id' => 1
            ],
            [
                'permission_id' => 8,
                'role_id' => 1
            ],
            [
                'permission_id' => 9,
                'role_id' => 1
            ],
            [
                'permission_id' => 10,
                'role_id' => 1
            ],
            [
                'permission_id' => 11,
                'role_id' => 1
            ],
            [
                'permission_id' => 12,
                'role_id' => 1
            ],
            [
                'permission_id' => 3,
                'role_id' => 2
            ],
            [
                'permission_id' => 3,
                'role_id' => 3
            ],
            [
                'permission_id' => 3,
                'role_id' => 4
            ],
            [
                'permission_id' => 3,
                'role_id' => 5
            ],
            [
                'permission_id' => 3,
                'role_id' => 6
            ],
            [
                'permission_id' => 3,
                'role_id' => 7
            ],
            [
                'permission_id' => 3,
                'role_id' => 8
            ],
            [
                'permission_id' => 7,
                'role_id' => 3
            ],
            [
                'permission_id' => 8,
                'role_id' => 4
            ],
            [
                'permission_id' => 9,
                'role_id' => 5
            ],
            [
                'permission_id' => 10,
                'role_id' => 6
            ],
            [
                'permission_id' => 11,
                'role_id' => 7
            ],
            [
                'permission_id' => 12,
                'role_id' => 8
            ],
        ];

        DB::table('spatieRoleHasPermissions')->insert($arrayOfRoleHasPermissions);
    }
}
