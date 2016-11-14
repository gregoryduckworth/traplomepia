<?php

use App\Models\Role;

class DeletingRoleTest extends \Codeception\Test\Unit
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
        // Create the new role
        $role = Role::create([
            'name' => 'new-role',
            'display_name' => 'New Role',
            'description' => 'A completely new role',
        ]);
        $this->tester->seeRecord('roles', ['display_name' => 'New Role']);

        // Delete the Role
        $role->delete();

        // Check the record is has been updated so that the 
        // deleted_at column now contains a value
        $this->tester->dontSeeRecord('roles', ['display_name' => 'New Role']);
    } 
}

        
