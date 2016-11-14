<?php

use App\Models\Role;
use App\Models\Permission;

class CreatingRoleTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * Create the record in the database
     * and see if it is in the system
     */
    public function testCreatingRole()
    {
        // Create a new permission to attach to the role
        $permission = Permission::create([
            'name' => 'new-permission',
            'display_name' => 'New Permission',
            'description' => 'Creating a new ppermission to attach to a role',
        ]);
        $this->tester->seeRecord('permissions', ['display_name' => 'New Permission']);

        // Create the new role
        $role = Role::create([
            'name' => 'new-role',
            'display_name' => 'New Role',
            'description' => 'A completely new role',
        ]);
        $this->tester->seeRecord('roles', ['display_name' => 'New Role']);

        // Attach the permission to the role
        $role->attachPermissions([$permission]);

        // Check that the relationship has been added
        $this->tester->seeRecord('permission_role', ['permission_id' => $permission->id, 'role_id' => $role->id]);
    }
}
