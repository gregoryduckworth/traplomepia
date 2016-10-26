<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\RoleInterface as Role;
use App\Repositories\Interface\UserInterface as User;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role, User $user)
    {
        $this->user = $user;
        view()->share('roles', $role->all());
    }

    /**
     * Show the user list page
     *
     * @return Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show a specific user
     *
     * @param  $id of USer
     * @return User
     */
    public function show($id)
    {
        return view('users.show')
            ->withUser($this->user->find($id));
    }

    /**
     * Show the delete users page
     *
     * @return Response
     */
    public function deleted()
    {
        return view('users.index');
    }

    /**
     * Show the user creation form
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Get the specific user by ID and
     * show the form to enable the edit
     *
     * @param  $id of User
     * @return User
     */
    public function edit($id)
    {
        return view('users.edit')
            ->withUser($this->user->find($id));
    }

}
