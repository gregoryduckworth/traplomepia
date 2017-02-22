<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that we cannot login with an email address
     * that does not exist
     *
     * @return void
     */
    public function testUserDoesNotExist()
    {
        $this->browse(function ($browser) {
            $browser->assertPathIs($this->url());

            $browser->visit('/login')
                ->type('email', 'doesNotExist@example.com')
                ->type('password', 'password')
                ->press('Sign in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we cannot login with the wrong password
     *
     * @return void
     */
    public function testIncorrectPassword()
    {
        $user = factory(User::class)->create([
            'email' => 'incorrectPassword@example.com',
            'password' => 'password'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password1')
                ->press('Sign in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we cannot login with the wrong email address
     *
     * @return void
     */
    public function testIncorrectEmail()
    {
        $user = factory(User::class)->create([
            'email' => 'incorrectEmail@example.com',
            'password' => 'password'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', 'wrongEmail@example.com')
                ->type('password', 'password')
                ->press('Sign in')
                ->assertPathIs('/login')
                ->assertSee(trans('auth.failed'));
        });
    }

    /**
     * Check that we need to enter an email
     *
     * @return void
     */
    public function testEmailRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('password', 'password')
                ->press('Sign in')
                ->assertPathIs('/login')
                ->assertSee(trans('validation.required', ['attribute' => 'email']));
        });
    }

    /**
     * Check that we need to enter a password
     *
     * @return void
     */
    public function testPasswordRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'passwordRequired@example.com')
                ->press('Sign in')
                ->assertPathIs('/login')
                ->assertSee(trans('validation.required', ['attribute' => 'password']));
        });
    }

    /**
     * Check that we can login with the correct credentials
     *
     * @return void
     */
    public function testPositiveLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'positiveLogin@example.com',
            'password' => 'password'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Sign in')
                    ->assertPathIs('/home');
        });
    }
}
