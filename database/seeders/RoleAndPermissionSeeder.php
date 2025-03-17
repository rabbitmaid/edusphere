<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'administrator'],
            ['name' => 'staff'],
            ['name' => 'student']
        ];

        $permissions = [
            ['name' => 'user management'],
            ['name' => 'view users'],
            ['name' => 'create users'],
            ['name' => 'update users'],
            ['name' => 'delete users'],
            ['name' => 'activate users'],
            ['name' => 'deactivate users'],
            ['name' => 'view students'],
            ['name' => 'create students'],
            ['name' => 'update students'],
            ['name' => 'delete students'],
            ['name' => 'school management'],
            ['name' => 'view classes'],
            ['name' => 'update classes'],
            ['name' => 'view subjects'],
            ['name' => 'create subjects'],
            ['name' => 'update subjects'],
            ['name' => 'view marks'],
            ['name' => 'create marks'],
            ['name' => 'update marks'],
            ['name' => 'manage settings']
        ];

        foreach($roles as $role){
            $create = Role::firstOrCreate(['name' => $role['name']]);
        }

        // Create permissions and assign to administrator
        foreach($permissions as $permission) {
            $create = Permission::firstOrCreate(['name' => $permission['name']]);
            $create->assignRole('administrator');
        }
    }
}
