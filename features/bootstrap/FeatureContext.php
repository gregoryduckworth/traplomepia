<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Driver\Selenium2Driver;
use Illuminate\Support\Facades\Auth;
use Laracasts\Behat\Context\DatabaseTransactions;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use DatabaseTransactions;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        //
    }

    /**
     * Login as a specific user
     *
     * @Given I am logged in as :email
     */
    public function iAmLoggedInAs($email)
    {
        $user = factory(App\Models\User::class)->create(['email' => $email]);
        \Auth::login($user);
    }

    /**
     * @Given I have an account :email :password
     */
    public function iHaveAnAccount($email, $password)
    {
        factory(App\Models\User::class)->create(['email' => $email, 'password' => $password]);
    }

    /**
     * @Given site setting :name is :value
     */
    public function siteSettingIs($name, $value)
    {
        config()->set('settings.' . $name, $value);
    }

    /**
     * @Given I am logged in as an :role
     */
    public function iAmLoggedInAsAn($role)
    {
        $role = App\Models\Role::where('name', $role)->first();
        \Auth::login($role->users->first());
    }
}
