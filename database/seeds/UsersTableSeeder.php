<?php

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
    	// Create new users for the system
        factory(App\Models\User::class, rand(10,20))->create();
    }
}
