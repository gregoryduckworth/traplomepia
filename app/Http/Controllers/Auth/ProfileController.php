<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProfileController extends Controller
{
    /**
     * Redirect user to their profile page
     *
     * @return Response
     */
    public function index()
    {
        return view('users.profile.index');
    }

    public function edit($id)
    {
        return view('users.profile.edit');
    }
}
