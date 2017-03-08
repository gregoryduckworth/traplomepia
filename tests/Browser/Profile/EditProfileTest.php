<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Profile\EditProfile;
use Tests\Browser\Pages\Profile\Profile;
use Tests\DuskTestCase;

class EditProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Check that the users details are displayed
     * in the appropriate places
     *
     * @group profile
     * @group edit-profile
     * @return void
     */
    public function testCheckUserDetails()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit(new EditProfile)
                ->assertSelected('@title', $user->title)
                ->assertSelected('@first_name', $user->first_name)
                ->assertSelected('@last_name', $user->last_name)
                ->assertSelected('@email', $user->email)
                ->assertSelected('@dob', $user->dob)
                ->assertPathIs('/profile/edit');
        });
    }

    /**
     * Check that we can update all the details about the
     * user to that of new ones
     *
     * @group profile
     * @group edit-profile
     * @return void
     */
    public function testInvalidDetails()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit(new EditProfile)
                ->assertSelected('@title', $user->title)
                ->assertSelected('@first_name', $user->first_name)
                ->assertSelected('@last_name', $user->last_name)
                ->assertSelected('@email', $user->email)
                ->assertSelected('@dob', $user->dob)
                ->assertPathIs('/profile/edit');

            $browser->type('@first_name', '')
                ->type('@last_name', '')
                ->type('@email', '')
                ->press('@submit')
                ->waitForText(trans('validation.required', ['attribute' => 'first name']))
                ->waitForText(trans('validation.required', ['attribute' => 'last name']))
                ->waitForText(trans('validation.required', ['attribute' => 'email']))
                ->press('@confirm');
        });
    }

    /**
     * Check that we can update all the details about the
     * user to that of new ones
     *
     * @group profile
     * @group edit-profile
     * @return void
     */
    public function testUpdateUserDetails()
    {
        $user = factory(User::class)->create();

        $new_user = factory(User::class)->make();

        $this->browse(function ($browser) use ($user, $new_user) {
            $browser->loginAs($user)
                ->visit(new EditProfile)
                ->assertSelected('@title', $user->title)
                ->assertSelected('@first_name', $user->first_name)
                ->assertSelected('@last_name', $user->last_name)
                ->assertSelected('@email', $user->email)
                ->assertSelected('@dob', $user->dob)
                ->assertPathIs('/profile/edit');

            $browser->select('@title', $new_user->title)
                ->type('@first_name', $new_user->first_name)
                ->type('@last_name', $new_user->last_name)
                ->type('@email', $new_user->email)
                ->value('@dob', $new_user->dob)
                ->press('@submit')
                ->waitForText(trans('json.profile_updated'))
                ->assertPathIs('/profile/edit');

            $browser->visit(new Profile)
                ->assertSee($new_user->title)
                ->assertSee($new_user->first_name)
                ->assertSee($new_user->last_name)
                ->assertSee($new_user->email)
                ->assertSee($new_user->dob);
        });
    }
}
