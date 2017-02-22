<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Login extends Homepage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
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
            ->assertTitleContains('Log in')
            ->assertSee('Login')
            ->assertSee('Email')
            ->assertInputValue('email', '')
            ->assertSee('Password')
            ->assertInputValue('password', '')
            ->assertNotChecked('remember')
            ->assertSee('Sign in')
            ->assertSee('Not Registered');
            ->assertSee('Forgot Password');
    }
    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            //
        ];
    }
}