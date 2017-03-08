<?php

namespace Tests\Browser\Pages\Profile;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Profile extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/profile';
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
            ->assertTitleContains(trans('users.profile'))
            ->assertSee(trans('users.profile'));
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
