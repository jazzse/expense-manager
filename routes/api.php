<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - Roles
|--------------------------------------------------------------------------
*/
Route::post('role/list/update/{id}', 'RolesController@updateRole');
Route::post('role', 'RolesController@store');
Route::get('role/list', 'RolesController@index');
Route::get('role/list/{id}', 'RolesController@getRole');
Route::post('role/list/delete/{id}', 'RolesController@delete');

/*
|--------------------------------------------------------------------------
| API Routes - Users
|--------------------------------------------------------------------------
*/
Route::post('user/list/update/{id}', 'UsersController@updateUser');
Route::post('user', 'UsersController@store');
Route::get('user/list', 'UsersController@index');
Route::get('user/userRoles', 'UsersController@userRoles');
Route::get('user/list/{id}', 'UsersController@getUser');
Route::post('user/list/delete/{id}', 'UsersController@delete');

/*
|--------------------------------------------------------------------------
| API Routes - Expense Categories
|--------------------------------------------------------------------------
*/
Route::post('category/list/update/{id}', 'ExpenseCategoryController@updateCategory');
Route::post('category', 'ExpenseCategoryController@store');
Route::get('category/list', 'ExpenseCategoryController@index');
Route::get('category/list/{id}', 'ExpenseCategoryController@getCategory');
Route::post('category/list/delete/{id}', 'ExpenseCategoryController@delete');





