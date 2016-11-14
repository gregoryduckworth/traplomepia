<?php

use App\Models\Role;

class UpdatingRoleTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * Delete the record from the database
     */
    public function testUpdatingRole()
    {
        // Create the new role
        $role = Role::create([
            'name' => 'new-role',
            'display_name' => 'New Role',
            'description' => 'A completely new role',
        ]);
        $this->tester->seeRecord('roles', ['display_name' => 'New Role']);

        // Update the database with the new value
        $role->update(['display_name' => 'Updated Role']);

        // Check the record exists in the database with the new value
        // and the old one does not exist
        $this->tester->seeRecord('roles', ['display_name' => 'Updated Role']);
        $this->tester->dontSeeRecord('roles', ['display_name' => 'New Role']);
    }
}
