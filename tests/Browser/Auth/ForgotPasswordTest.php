<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Auth\ForgotPassword;
use Tests\DuskTestCase;

class ForgotPasswordTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that we cannot send a password reminder
     * without an email address
     *
     * @group auth
     * @group password
     * @return void
     */
    public function testAllFieldsRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit(new ForgotPassword)
                ->press('@send-password')
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('message.email'))]))
                ->assertPathIs('/password/reset');
        });
    }

    /**
     * Check that we cannot send a password reminder
     * with an invalid email address
     *
     * @group auth
     * @group password
     * @return void
     */
    public function testInvalidEmail()
    {
        $this->browse(function ($browser) {
            $browser->visit(new ForgotPassword)
                ->type('@email', 'notRegistered@example.com')
                ->press('@send-password')
                ->assertSee(trans('passwords.user'))
                ->assertPathIs('/password/reset');
        });
    }

    /**
     * Check that we cann send a password reminder
     * with an valid email address
     *
     * @group auth
     * @group password
     * @return void
     */
    public function testValidEmail()
    {
        $user = factory(User::class)->create([
            'email' => 'passwordRecovery@example.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new ForgotPassword)
                ->type('@email', $user->email)
                ->press('@send-password')
                ->assertSee(trans('passwords.sent'))
                ->assertPathIs('/password/reset');
        });
    }
}
