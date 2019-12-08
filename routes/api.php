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

Route::post('role/list/update/{id}', 'RolesController@updateRole');
Route::post('role', 'RolesController@store');
Route::get('role/list', 'RolesController@index');
Route::get('role/list/{id}', 'RolesController@getRole');
Route::post('role/list/delete/{id}', 'RolesController@delete');

