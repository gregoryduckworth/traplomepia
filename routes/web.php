<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', ['as' => 'welcome', function () {
    return view('welcome');
}]);

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('logout', ['as' => 'logout.post', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

// Logged in Routes...
Route::group(['middleware' => ['auth']], function () {

    // Main Routes...
    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

    // Proile Routes...
    Route::get('profile', ['as' => 'profile.index', 'uses' => 'Auth\ProfileController@index']);
    Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'Auth\ProfileController@edit']);
});

// Admin Routes...
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::group(['middleware' => ['role:administrator']], function(){
        Route::get('site/settings', ['as' => 'settings.index', 'uses' => 'SiteSettingsController@index']);
    });

    // User Management Routes...
    Route::group(['middleware' => ['permission:manage-users']], function () {
        Route::get('users/deleted', ['as' => 'users.deleted', 'uses' => 'UserController@deleted']);
        Route::resource('users', 'UserController');
    });

    // Role Management Routes...
    Route::group(['middleware' => ['permission:manage-roles']], function () {
        Route::get('roles/deleted', ['as' => 'roles.deleted', 'uses' => 'RoleController@deleted']);
        Route::resource('roles', 'RoleController');
    });

});
