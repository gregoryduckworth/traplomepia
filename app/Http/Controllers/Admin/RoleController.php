<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\RoleRepository as Role;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Show the role list page
     *
     * @return Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show a specific role 
     * 
     * @param  $id of Role
     * @return User
     */
    public function show($id)
    {
        return view('roles.show')
            ->withRole($this->role->find($id));
    }

    /**
     * Show the delete roles page
     * 
     * @return Response
     */
    public function deleted()
    {
        return view('roles.index');
    }

    /**
     * Show the role creation form
     * 
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Get the specific role by ID and
     * show the form to enable the edit
     * 
     * @param  $id of Role
     * @return Role
     */
    public function edit($id)
    {
        return view('roles.edit')
            ->withRole($this->role->find($id));
    }



}