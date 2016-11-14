<?php

use App\Models\User;

class UpdatingUserTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester; 

    /**
     * Delete the record from the database
     */
    public function testUpdatingUser()
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

        // Update the database with the new value
        $user->update(['email' => 'doe.john@example.com']);

        // Check the record exists in the database with the new value
        // and the old one does not exist
        $this->tester->seeRecord('users', ['email' => 'doe.john@example.com']);
        $this->tester->dontSeeRecord('users', ['email' => 'john.doe@example.com']);


    } 
}
