<?php

use App\Models\Permission;
use App\Models\Role;
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
        // Create each of the permissions
        // User Permission
        $manage_users = Permission::create([
            'name' => 'manage-users',
            'display_name' => 'Manage Users',
            'description' => 'Abiliy to manage all the users',
        ]);

        // Role Permission
        $manage_roles = Permission::create([
            'name' => 'manage-roles',
            'display_name' => 'Manage Roles',
            'description' => 'Abiliy to manage all the roles',
        ]);

        // Create each of the roles  
        // Administrator
        $admin = Role::create([
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'The Administrator has the ability to manage everything within the site',
        ]);

        $admin->attachPermissions([$manage_users, $manage_roles]);

        // User Manager
        $user_manager = Role::create([
            'name' => 'user-manager',
            'display_name' => 'User Manager',
            'description' => 'The User Manager has the ability to manage users within the site',
        ]);

        $user_manager->attachPermissions([$manage_users]);

        // Role Manager
        $role_manager = Role::create([
            'name' => 'role-manager',
            'display_name' => 'Role Manager',
            'description' => 'The Role Manager has the ability to manage roles within the site',
        ]);

        $role_manager->attachPermissions([$manage_roles]);


    }
}
