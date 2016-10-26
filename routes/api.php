<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Settings Api
Route::group(['middleware' => 'role:administrator'], function () {
    Route::patch('site/settings', ['as' => 'settings.update', 'uses' => 'SiteSettingsController@update']);
});

// User Api
Route::group(['middleware' => 'permission:manage-users'], function () {
    Route::get('users/deleted', ['as' => 'users.deleted', 'uses' => 'UserController@deleted']);
    Route::get('users/restore/{id?}', ['as' => 'users.restore', 'uses' => 'UserController@restore']);
    Route::resource('users', 'UserController');
});

// Role Api
Route::group(['middleware' => 'permission:manage-roles'], function () {
    Route::get('roles/deleted', ['as' => 'roles.deleted', 'uses' => 'RoleController@deleted']);
    Route::get('roles/restore/{id?}', ['as' => 'roles.restore', 'uses' => 'RoleController@restore']);
    Route::resource('roles', 'RoleController');
});

// Profile Api
Route::patch('profile/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@updatePassword']);
