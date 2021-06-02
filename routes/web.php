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


Route::group(['prefix' => 'auth'], function () {
    
	Route::get('/login', function () {
	    return view('user.auth.login');
	})->name('auth.login');

	Route::get('/register', function () {
	    return view('user.auth.register');
	})->name('auth.register');

	Route::get('/forgot-password', function () {
	    return view('user.auth.recover');
	})->name('auth.recover');

});

Route::group(['middleware' => ['web'], 'prefix' => 'frontend'], function () {
    
	Route::get('/', function () {
	    return view('user.index');
	});

	Route::get('/video/123', function () {
	    return view('user.single');
	})->name('web.single');


	Route::get('/page/123', function () {
	    return view('user.page');
	})->name('web.page');

	Route::get('/category/123', function () {
	    return view('user.category');
	})->name('web.category');


	Route::get('/search', function () {
	    return view('user.search');
	})->name('web.search');



});


Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
    
	Route::get('/', function () {
	    return view('user.account');
	})->name('user.dashboard');

});


Route::group(['middleware' => ['web'], 'prefix' => 'user'], function () {
    
	Route::get('/', function () {
	    return view('user.index');
	});



});
