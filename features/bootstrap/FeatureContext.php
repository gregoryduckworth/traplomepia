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
     * @Then /^(?:|I )should see "([^"]*)" in popup$/
     *
     * @param string $message The message.
     */
    public function assertPopupMessage($message)
    {
        $alertText = $this->getMainContext()->getSession()->getDriver()->getWebDriverSession()->getAlert_text();
        if ($alertText !== $message){
            throw new Exception("Modal dialog present: $alertText, when expected was $message");
        }   
    }
}
