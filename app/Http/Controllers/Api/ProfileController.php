<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageFormRequest;
use App\Http\Requests\PasswordFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Repositories\Contracts\UserInterface as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Update a user in the system
     *
     * @param  UserFormRequest $request
     * @return Response
     */
    public function update(UserFormRequest $request)
    {
        // We need to get the details of the current
        // user so that we can update them
        $user = $this->user->find(Auth::user()->id);

        if ($user->update($request->all())) {
            return response()->json(['msg' => trans('json.profile_updated', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }

    /**
     * Update the users password
     *
     * @param  PasswordFormRequest $request
     * @return Response
     */
    public function updatePassword(PasswordFormRequest $request)
    {
        // Find the current user logged in
        $user = $this->user->find(\Auth::user()->id);

        // Check the old password typed in matches
        if (Hash::check($request->old_password, $user->password)) {
            // Update the user to have the new password
            $user->update(['password' => $request->password_confirmation]);
            return response()->json(['msg' => trans('json.password_update', ['type' => trans('users.user')]), 'status' => 'success']);
        } else {
            return response()->json(['msg' => trans('json.password_not_match'), 'status' => 'error']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }

    /**
     * Get the profile picture uploaded by the user for the site
     *
     * @param  ImageFormRequest $request
     * @return Response
     */
    public function updateProfilePicture(ImageFormRequest $request)
    {
        if ($image = $request->image) {
            // Find the current user
            $user = $this->user->find(Auth::user()->id);
            $user->update(['profile_picture' => Helper::createImage($user, $user->profile_picture, $image)]);
            return response()->json(['msg' => trans('json.profile_image_updated', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
