<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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

    /**
     * Redirect the user to the profile edit
     * page
     *
     * @return View
     */
    public function edit()
    {
        return view('users.profile.edit');
    }
}
