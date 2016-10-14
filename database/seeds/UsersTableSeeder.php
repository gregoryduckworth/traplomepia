<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::find(1);

    	$admin_user = User::create([
    		'title' => 'Mr',
    		'first_name' => 'Admin',
    		'last_name' => 'Istrator',
    		'email' => 'administrator@example.com',
    		'password' => 'password',
    	]);

        $admin_user->attachRole($admin_role);

    	// Create new users for the system
        factory(App\Models\User::class, 15)->create();
    }
}
