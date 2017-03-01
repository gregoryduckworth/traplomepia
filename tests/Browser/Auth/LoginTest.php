<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Login;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that we cannot login with an email address
     * that does not exist
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testUserDoesNotExist()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login)
                ->type('@email', 'doesNotExist@example.com')
                ->type('@password', 'password')
                ->press('@sign-in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we cannot login with the wrong password
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testIncorrectPassword()
    {
        $user = factory(User::class)->create([
            'email' => 'incorrectPassword@example.com',
            'password' => 'password',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->type('@email', $user->email)
                ->type('@password', 'password1')
                ->press('@sign-in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we cannot login with the wrong email address
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testIncorrectEmail()
    {
        $user = factory(User::class)->create([
            'email' => 'incorrectEmail@example.com',
            'password' => 'password',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->type('@email', 'wrongEmail@example.com')
                ->type('@password', 'password')
                ->press('@sign-in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we need to enter an email
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testEmailRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login)
                ->type('@password', 'password')
                ->press('@sign-in')
                ->assertPathIs('/login')
                ->assertSee(trans('validation.required', ['attribute' => 'email']));
        });
    }

    /**
     * Check that we need to enter a password
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testPasswordRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login)
                ->type('@email', 'passwordRequired@example.com')
                ->press('@sign-in')
                ->assertPathIs('/login')
                ->assertSee(trans('validation.required', ['attribute' => 'password']));
        });
    }

    /**
     * Check that we can login with the correct credentials
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testPositiveLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'positiveLogin@example.com',
            'password' => 'password',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->type('@email', $user->email)
                ->type('@password', 'password')
                ->press('@sign-in')
                ->assertPathIs('/home');
        });
    }
}
