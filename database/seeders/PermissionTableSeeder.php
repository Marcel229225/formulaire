<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'form-list',
            'form-create',
            'form-edit',
            'form-show',
            'agence-create',
            'agence-list',
            'agence-edit',
            'agence-delete',


        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
