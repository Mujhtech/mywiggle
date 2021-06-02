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

Route::get('/', function () {
    return view('index');
});


Route::group(['middleware' => ['web', 'guest'], 'prefix' => 'auth'], function () {
    
	Route::get('/login', function () {
	    return view('user.auth.login');
	})->name('auth.login');

	Route::get('/register', function () {
	    return view('user.auth.register');
	})->name('auth.register');

	Route::get('/forgot-password', function () {
	    return view('user.auth.recover');
	})->name('auth.recover');

	Route::get('/register/{code}', 'AuthController@referral');

	Route::post('/login', 'AuthController@login')->name('auth.login.post');
	Route::post('/register', 'AuthController@register')->name('auth.register.post');
	Route::post('/forgot-password', 'AuthController@recover')->name('auth.recover.post');

});

Route::get('/logout', 'AuthController@logout')->name('auth.logout');

Route::group(['middleware' => ['web'], 'prefix' => 'frontend'], function () {
    
	Route::get('/', 'FrontendController@index')->name('web.index');

	Route::get('/video/{slug}', 'FrontendController@single')->name('web.single');

	Route::get('/page/{slug}', 'FrontendController@page')->name('web.page');

	Route::get('/category/{slug}', 'FrontendController@category')->name('web.category');

	Route::get('/search', 'FrontendController@search')->name('web.search');

});


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    
	Route::get('/dashboard', function () {
	    return view('user.dashboard');
	})->name('user.dashboard');

});


Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {
    
	Route::get('/', function () {
	    return view('user.index');
	});



});
