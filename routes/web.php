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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();



Route::middleware('auth') /* Controlla se un utente è loggato, se si va ad Home */
->name('admin.')
->prefix('admin')  
->namespace('admin')  /* indica la cartella */
->group( function() {
    Route::get('/', 'HomeController@index')->name('home');

});   /* indica il gruppo di route */


Route::get("{any?}",function() {
    return view("guests.home");
})->where("any", ".*");