<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Notifications\NewUserPasswordEmail;
use App\Repositories\Contracts\RoleInterface as Role;
use App\Repositories\Contracts\UserInterface as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Show all the users in the system
     *
     * @return Users
     */
    public function index()
    {
        return Datatables::of($this->user->all())
            ->addColumn('actions', function ($user) {
                return view('users.datatables', ['view' => 'users', 'data' => $user])->render();
            })
            ->make(true);
    }

    /**
     * Show the specific users details
     *
     * @param  $id ID of User
     * @return User
     */
    public function show($id)
    {
        return response()->json(['data' => $this->user->find($id)]);
    }

    /**
     * Delete a specific user from the user list
     *
     * NOTE: we only soft delete so the user
     * can come back into the system
     *
     * @param  $id ID of User
     * @return JSON
     */
    public function destroy($id)
    {
        // Find the user who we want to delete
        if ($this->user->find($id)) {
            // Delete the user from the system
            $this->user->delete($id);
            return response()->json(['msg' => trans('json.deletion_success', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        // If there was an error somewhere, return a failure
        else {
            return response()->json(['msg' => trans('json.deletion_failed', ['type' => trans('users.user')]), 'status' => 'warning']);
        }
    }

    /**
     * Show all the users in the system who
     * have been deleted
     *
     * @return Users
     */
    public function deleted()
    {
        return Datatables::of($this->user->deleted())
            ->addColumn('actions', function ($user) {
                return view('layouts.partials.datatables.actions.restore', ['view' => 'users', 'data' => $user])->render();
            })
            ->make(true);
    }

    /**
     * Restore a specific user from the user list
     *
     * @param  $id ID of User
     * @return Response
     */
    public function restore($id)
    {
        // Check the ID is not set to NULL
        if ($id == null) {
            return response()->json(['msg' => trans('json.provide_valid_id', ['type' => trans('users.user')]), 'status' => 'warning']);
        }

        // Restore the user based on the ID provided
        if ($user = $this->user->deleted()->find($id)) {
            $user->restore($id);
            return response()->json(['msg' => trans('json.restore_success', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        // If there was an error somewhere, return a failure
        else {
            return response()->json(['msg' => trans('json.restore_failed', ['type' => trans('users.user')]), 'status' => 'error']);
        }
    }

    /**
     * Create a new user in the system and send them
     * an email with their new password
     *
     * @param  UserFormRequest $request
     * @return Response
     */
    public function store(UserFormRequest $request)
    {
        // We need to create a password for the new user
        $request['password'] = str_random(10);

        if ($user = $this->user->create($request->all())) {
            // Create token to send an email to the new user to set
            // their password for the application
            $token = Password::getRepository()->create($user);
            $user->notify(new NewUserPasswordEmail($token));

            // Attach the roles if any are set
            if (!empty($request['roles'])) {
                $user->attachRoles($request['roles']);
            }

            return response()->json(['msg' => trans('json.data_stored', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
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
        $user = $this->user->find($request->id);

        // Detach all existing roles to ensure that we attach the
        // new ones correctly
        $user->detachRoles($this->role->all());
        if (!empty($request['roles'])) {
            $user->attachRoles($request['roles']);
        }

        if ($this->user->update($request->except(['_token', 'roles']), $request->id)) {
            return response()->json(['msg' => trans('json.data_updated', ['type' => trans('users.user')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
