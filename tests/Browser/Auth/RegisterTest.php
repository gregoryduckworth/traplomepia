<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Auth\Register;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that we cannot register without any details
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testAllFieldsRequired()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                ->press('@register')
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('users.first_name'))]))
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('users.last_name'))]))
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('users.email'))]))
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('message.password'))]))
                ->assertSee(trans('validation.required', ['attribute' => strtolower(trans('message.terms'))]))
                ->assertPathIs('/register');
        });
    }

    /**
     * Check that we can register for the site
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testCanRegister()
    {
        $user = factory(User::class)->make();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Register)
                ->type('@first_name', $user->first_name)
                ->type('@last_name', $user->last_name)
                ->type('@email', $user->email)
                ->type('@password', 'password')
                ->type('@password_confirmation', 'password')
                ->check('@terms')
                ->press('@register')
                ->assertPathIs('/home');
        });
    }
}
