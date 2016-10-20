<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
     * Create a new user in the system
     *
     * @param  UserFormRequest $request
     * @return Response
     */
    public function update(UserFormRequest $request)
    {
        // We need to create a password for the new user
        $user = $this->user->find(\Auth::user()->id);

        if ($user->update($request->all())) {
            return response()->json(['msg' => trans('json.data_updated', ['type' => 'User']), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
