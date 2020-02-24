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
    return view('awal');
});



Route::resource('crud', 'CrudsController');

Route::get('/search', 'CrudsController@search');

Route::get('/ortu/{id}/profile', 'OrtuController@profile');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
