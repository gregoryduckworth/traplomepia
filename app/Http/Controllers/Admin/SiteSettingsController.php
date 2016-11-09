<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class SiteSettingsController
 * @package App\Http\Controllers
 */
class SiteSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the site setings page
     *
     * @return Response
     */
    public function index()
    {
        return view('site.index');
    }
}
