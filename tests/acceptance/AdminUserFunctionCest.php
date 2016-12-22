<?php

class AdminUserFunctionCest
{
    // Ensure we can view all the users on the site
    public function viewAllUsers(AcceptanceTester $I)
    {
        // Ensure that we have the registration open
        // before we perform the tests
        //config()->set('settings.registration', 'open'); 
        $I->amOnRoute('admin.users.create');
        
    }

   
}
