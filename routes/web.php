<?php

use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home'); */

Route::middleware('auth')
->namespace('admin')
->name('admin.')
->prefix('admin')
->group( function() {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource("users", "UserController");

    Route::resource("posts", "PostController");

});

/* Route::get('/', function () {    
    return view('guests.home');
}); */                               //sostituita con any in modo che se non riconosce la rotta va comunque a guest

Route::get("{any?}",function() {    // serve a creare una rotta generica che ho se clicco un url generico 
    return view("guests.home");
})->where("any", ".*");