<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Profile\Profile;
use Tests\DuskTestCase;

class ProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that the correct details for the user are
     * displayed on the screen
     *
     * @group profile
     *
     * @return void
     */
    public function testUserDetails()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit(new Profile)
                ->assertSee($user->title)
                ->assertSee($user->first_name)
                ->assertSee($user->last_name)
                ->assertSee($user->email)
                ->assertSee($user->dob);
        });
    }

    /**
     * Check that we cannot send a password reminder
     * without an email address
     *
     * @group profile
     * @group change-password
     * @return void
     */
    public function testChangePassword()
    {
        $user = factory(User::class)->create([
            'password' => 'password',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit(new Profile)
                ->type('old_password', 'password')
                ->type('password', 'password1')
                ->type('password_confirmation', 'password1')
                ->press('change-password')
                ->waitForText(trans('swal.text_success'))
                ->assertPathIs('/profile');
        });
    }
}
