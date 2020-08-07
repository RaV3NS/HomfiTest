<?php

use Illuminate\Support\Facades\Route;

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

// Landing Routes
Route::get('/', 'LandingController@index');

// Auth
Auth::routes();

// Non-form logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Admin | Objects (objects list as main page)
Route::get('/admin', 'Admin\ObjectController@list')->name('list_object');
Route::get('/admin/objects/create', 'Admin\ObjectController@createPage')->name('create_object');
Route::post('/admin/objects/create', 'Admin\ObjectController@store')->name('store_object');
Route::get('/admin/objects/edit/{id}', 'Admin\ObjectController@editPage')->name('edit_object');
Route::post('/admin/objects/edit/{id}', 'Admin\ObjectController@update')->name('update_object');
Route::post('/admin/objects/delete/{id}', 'Admin\ObjectController@delete')->name('delete_object');

// Search
Route::get('/search', 'LandingController@search')->name('search');
