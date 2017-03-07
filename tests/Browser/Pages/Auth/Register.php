<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Register extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/register';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
            ->assertTitleContains(trans('message.register'))
            ->assertSee(trans('message.register'))
            ->assertSee(trans('users.first_name'))
            ->assertInputValue('first_name', '')
            ->assertSee(trans('users.last_name'))
            ->assertInputValue('last_name', '')
            ->assertSee(trans('users.email'))
            ->assertInputValue('email', '')
            ->assertSee(trans('message.password'))
            ->assertInputValue('password', '')
            ->assertSee(trans('users.password_confirmation'))
            ->assertInputValue('password_confirmation', '')
            ->assertSee(trans('message.password'))
            ->assertSee(trans('message.agree_terms'))
            ->assertNotChecked('terms')
            ->assertInputValue('register', trans('message.register'))
            ->assertSee(trans('message.membership'))
            ->assertSee(trans('message.terms'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@first_name' => 'input[name="first_name"]',
            '@last_name' => 'input[name="last_name"]',
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
            '@password_confirmation' => 'input[name="password_confirmation"]',
            '@terms' => 'input[name="terms"]',
            '@register' => 'input[name="register"]',
        ];
    }
}
