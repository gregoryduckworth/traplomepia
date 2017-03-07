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
        foreach (Role::all() as $role) {
            $role_user = User::create([
                'title' => 'Mr.',
                'first_name' => $role->display_name,
                'last_name' => $role->display_name,
                'email' => $role->name . '@example.com',
                'password' => 'password',
                'dob' => '2000-01-01',
                'gender' => 'male',
                'api_token' => str_random(60),
            ]);

            $role_user->attachRole($role);
        }

        // Create new users for the system
        factory(App\Models\User::class, 15)->create();
    }
}
