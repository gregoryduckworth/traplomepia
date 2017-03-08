<?php

namespace Tests\Browser\Pages\Profile;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class EditProfile extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/profile/edit';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@title' => 'select[id=title]',
            '@first_name' => 'input[id=first_name]',
            '@last_name' => 'input[id=last_name]',
            '@email' => 'input[id=email]',
            '@dob' => 'input[id=dob]',
            '@submit' => 'input[name=submit]',
            '@confirm' => 'button[class=confirm]',
        ];
    }
}
