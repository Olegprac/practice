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

// Auth::routes();

Route::get('/', function() {
	return redirect('/articles');
});

Route::resource('articles', 'ArticleController');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('authenticate');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('myarticles', 'UsersArticlesViewController@usersarticles')->name('usersarticles');
Route::get('accessdenied', 'UsersArticlesViewController@notenoughpermissions')->name('notenoughpermissions');