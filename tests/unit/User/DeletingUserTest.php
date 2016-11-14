<?php

use App\Models\User;

class DeletingUserTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester; 

    /**
     * Delete the record from the database
     */
    public function testDeletingUser()
    {
        $user = User::create([
            'title' => 'Mr',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        // Check the record exists in the database
        $this->tester->seeRecord('users', ['email' => 'john.doe@example.com']);

        // Delete the User
        $user->delete();

        // Check the record is has been updated so that the 
        // deleted_at column now contains a value
        $this->tester->dontSeeRecord('users', ['email' => 'john.doe@example.com', 'deleted_at' => NULL]);
    } 
}
