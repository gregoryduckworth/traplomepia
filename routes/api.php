<?php

use Illuminate\Http\Request;

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

// User Api
Route::get('users/deleted', ['as' => 'users.deleted', 'uses' => 'UserController@deleted']);
Route::get('users/restore/{id?}', ['as' => 'users.restore', 'uses' => 'UserController@restore']);
Route::resource('users', 'UserController');

// Role Api
Route::get('roles/deleted', ['as' => 'roles.deleted', 'uses' => 'RoleController@deleted']);
Route::get('roles/restore/{id?}', ['as' => 'roles.restore', 'uses' => 'RoleController@restore']);
Route::resource('roles', 'RoleController');