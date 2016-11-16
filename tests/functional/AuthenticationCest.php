<?php

class AuthenticationCest
{
    // Ensure that a user can register for the site
    public function registerForSite(FunctionalTester $I)
    {
        // Ensure that we have the registration open
        // before we perform the tests
        config()->set('settings.registration', 'open'); 
        $I->amOnRoute('register');
        $I->submitForm('#register_form', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => true,
        ]);
    }

    // Ensure that the user is able to login to the site
    public function loginForSite(FunctionalTester $I)
    {
        $I->amOnRoute('login');
        $I->submitForm('#login_form', [
            'email' => 'administrator@example.com',
            'password' => 'password',
        ]);
    }

    // Check that we can request a reminder email
    public function forgotPasswordForSite(FunctionalTester $I)
    {
        $I->amOnRoute('password.reset');
        $I->submitForm('#password_reset_form', [
            'email' => 'administrator@example.com',
        ]);
    }
}
