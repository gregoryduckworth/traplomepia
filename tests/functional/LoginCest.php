<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTestLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('#login input[name=email]', 'administrator@example.com');
        $I->fillField('#login input[name=password]', 'password');
        $I->click('Sign In');
    }
}
