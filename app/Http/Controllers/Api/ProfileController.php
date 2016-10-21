<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Repositories\Eloquent\UserRepository as User;

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
        $user = $this->user->find(\Auth::user()->id);

        if ($user->update($request->all())) {
            return response()->json(['msg' => trans('json.profile_updated', ['type' => 'User']), 'status' => 'success']);
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
        if (!\Hash::check($request->old_password, $user->password)) {
            return response()->json(['msg' => trans('json.password_not_match'), 'status' => 'error']);
        }
        // Update the current user with their new password
        elseif ($user->update($request->only('password'))) {
            return response()->json(['msg' => trans('json.password_update', ['type' => 'User']), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
