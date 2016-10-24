<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
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
     * @Given I am logged in as :arg1
     */
    public function iAmLoggedInAs($arg1)
    {
        $user = factory(App\Models\User::class)->create(['email' => $arg1]);

        \Auth::login($user);
    }

    /**
     * @Given I have an account :arg1 :arg2
     */
    public function iHaveAnAccount($arg1, $arg2)
    {
        factory(App\Models\User::class)->create(['email' => $arg1, 'password' => $arg2]);
    }
}
