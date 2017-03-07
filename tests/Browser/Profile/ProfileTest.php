<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that we cannot send a password reminder
     * without an email address
     *
     * @group auth
     * @group profile
     * @return void
     */
    public function testChangePassword()
    {
        $user = factory(User::class)->create([
            'password' => 'password',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/profile')
                ->type('old_password', 'password')
                ->type('password', 'password1')
                ->type('password_confirmation', 'password1')
                ->press('change-password')
                ->waitForText(trans('swal.text_success'))
                ->assertPathIs('/profile');
        });
    }
}
