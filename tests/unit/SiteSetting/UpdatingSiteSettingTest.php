<?php

use App\Models\SiteSettings;

class UpdatingSiteSettingTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * Delete the record from the database
     */
    public function testUpdatingSiteSetting()
    {
        // Create the new role
        $role = SiteSettings::create([
            'key' => 'test_value',
            'value' => 'Test Name',
        ]);
        $this->tester->seeRecord('site_settings', ['value' => 'Test Name']);

        // Update the database with the new value
        $role->update(['value' => 'New Test Name']);

        // Check the record exists in the database with the new value
        // and the old one does not exist
        $this->tester->seeRecord('site_settings', ['value' => 'New Test Name']);
        $this->tester->dontSeeRecord('site_settings', ['value' => 'Test Name']);
    }
}
