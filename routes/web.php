<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/role', function () {
    return view('role');
});
Route::get('/user', function () {
    return view('users');
});

Route::get('/expense-categories', function () {
    return view('expense_categories');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
