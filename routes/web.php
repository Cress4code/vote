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



Route::resource('/frontend','FrontendController');
Route::resource('/joueurs','JoueurController');

Route::resource('/votants','votantController');
Route::get('/tous-les-joueurs','FrontendController@allplayers')->name('allplayers');