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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@home')->name('home');

Route::get('/', 'GuestController@home') ->name('home');

Route::get('/posts', 'PostController@posts')->name('posts');

Route::middleware('auth')->prefix('posts')->group(function() {
    Route::get('/create', 'PostController@create')->name('create');
    Route::post('/store', 'PostController@store')->name('store');
    Route::get('/edit/{id}', 'PostController@edit')->name('edit');
    Route::post('/update/{id}', 'PostController@update')->name('update');
    Route::get('delete/{id}', 'PostController@delete')->name('delete');


 
});

Route::get('/login', 'Auth\LoginController@showLogin') ->name('show.login');
Route::post('/login', 'Auth\LoginController@login') ->name('login');

Route::get('/register', 'Auth\RegisterController@showRegister') -> name('show.register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

