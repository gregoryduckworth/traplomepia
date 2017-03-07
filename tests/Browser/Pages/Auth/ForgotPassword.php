<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ForgotPassword extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/password/reset';
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
            ->assertTitleContains(trans('message.password-reset'))
            ->assertSee(trans('message.email'))
            ->assertInputValue('email', '')
            ->assertInputValue('send-password', trans('message.send-password'))
            ->assertSee(trans('message.membership'))
            ->assertSee(trans('message.registermember'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name="email"]',
            '@send-password' => 'input[name="send-password"]',
        ];
    }
}
