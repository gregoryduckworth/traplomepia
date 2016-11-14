<?php

use App\Models\User;

class CreatingUserTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * Create the record in the database
     * and see if it is in the system
     */
    public function testCreatingUser()
    {
        // Create the User
        $user = User::create([
            'title' => 'Mr',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        // Check to see if the record is in the database
        $this->tester->seeRecord('users', ['email' => 'john.doe@example.com']);
    }
}
