<?php

class AuthenticationCest
{
    // Ensure that a user can register for the site
    public function registerForSite(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->fillField('#register input[name=first_name]', 'John');
        $I->fillField('#register input[name=last_name]', 'Doe');
        $I->fillField('#register input[name=email]', 'john.doe@example.com');
        $I->fillField('#register input[name=password]', 'password');
        $I->fillField('#register input[name=password_confirmation]', 'password');
        $I->click('submit');
    }

    // Ensure that the user is able to login to the site
    public function loginForSite(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('#login input[name=email]', 'administrator@example.com');
        $I->fillField('#login input[name=password]', 'password');
        $I->click('submit');
    }

    // Check that we can request a reminder email
    public function forgotPasswordForSite(FunctionalTester $I)
    {
        $I->amOnPage('/password/reset');
        $I->fillField('#reset-password input[name=email]', 'administrator@example.com');
        $I->click('submit');
    }
}
