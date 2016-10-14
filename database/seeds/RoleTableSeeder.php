<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manage_users = Permission::create([
            'name' => 'manage-users',
            'display_name' => 'Manage Users',
            'description' => 'Abiliy to manage all the users',
        ]);

        $manage_roles = Permission::create([
            'name' => 'manage-roles',
            'display_name' => 'Manage Roles',
            'description' => 'Abiliy to manage all the roles',
        ]);

        $admin = Role::create([
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'The Administrator has the ability to manage everything within the site',
        ]);  

        $admin->attachPermissions([$manage_users, $manage_roles]);

    }
}
