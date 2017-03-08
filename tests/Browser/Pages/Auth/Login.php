<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Login extends BasePage
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
            ->assertTitleContains(trans('message.login'))
            ->assertSee(trans('message.login'))
            ->assertSee(trans('message.email'))
            ->assertInputValue('email', '')
            ->assertSee(trans('message.password'))
            ->assertInputValue('password', '')
            ->assertNotChecked('remember')
            ->assertInputValue('sign-in', trans('message.sign-in'))
            ->assertSee(trans('message.registermember'))
            ->assertSee(trans('message.forgotpassword'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name=email]',
            '@password' => 'input[name=password]',
            '@sign-in' => 'input[name=sign-in]',
        ];
    }
}
