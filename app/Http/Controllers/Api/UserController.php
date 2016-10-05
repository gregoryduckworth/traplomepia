<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository as User;
use Illuminate\Http\Request;


class UserController extends Controller
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
     * Show all the users in the system
     * 
     * @return Users
     */
    public function index()
    {
        return $this->user->all();
    }

    /**
     * Show the specific users details
     * 
     * @param  $id ID of User
     * @return User
     */
    public function show($id)
    {
        return $this->user->find($id);
    }
}
