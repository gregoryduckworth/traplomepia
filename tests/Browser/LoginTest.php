<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    // TODO: look at changing to database
    // transactions rather than migrations
    use DatabaseMigrations;

    /**
     * Test login
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'test@nowhere.com',
            'password' => '12345Hello!'
        ]);

        \Log::info($user);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', '12345Hello!')
                    ->press('Sign in')
                    ->assertPathIs('/home');
        });
        
    }
}