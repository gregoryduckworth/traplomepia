<?php

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
    	User::create([
    		'title' => 'Mr',
    		'first_name' => 'Admin',
    		'last_name' => 'Istrator',
    		'email' => 'administrator@example.com',
    		'password' => 'password',
    	]);

    	// Create new users for the system
        factory(App\Models\User::class, 15))->create();
    }
}
