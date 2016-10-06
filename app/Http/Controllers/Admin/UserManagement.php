<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository as User;

/**
 * Class UserManagementController
 * @package App\Http\Controllers
 */
class UserManagement extends Controller
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
     * Show the user list page
     *
     * @return Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function show($id)
    {
        return view('users.show')
            ->withUser($this->user->find($id));
    }



}