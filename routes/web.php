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

/* 


	Route::get('/', function () {
    	return view('index');
	});
*/

Route::group(['middleware' => ['web']], function () {
    
	Route::get('/', 'FrontendController@index')->name('web.index');

	Route::get('/all-video/{type}', 'FrontendController@allvideo')->name('web.all');

	Route::get('/video/{slug}', 'FrontendController@single')->name('web.single');

	Route::get('/page/{slug}', 'FrontendController@page')->name('web.page');

	Route::get('/category/{slug}', 'FrontendController@category')->name('web.category');

	Route::get('/search', 'FrontendController@search')->name('web.search');

	Route::get('/share/{platform}/{slug}', 'FrontendController@share')->name('web.share');

	Route::get('/add-to-watch-list/{slug}', 'FrontendController@addToWatchList')->name('web.addwl');

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

	Route::get('/view/{code}', 'AuthController@referral')->name('auth.referral');

	Route::post('/login', 'AuthController@login')->name('auth.login.post');
	Route::post('/register', 'AuthController@register')->name('auth.register.post');
	Route::post('/forgot-password', 'AuthController@recover')->name('auth.recover.post');

});

Route::get('/logout', 'AuthController@logout')->name('auth.logout');


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    
	Route::get('/dashboard', 'UserController@index')->name('user.dashboard');

	Route::get('/profile', 'UserController@profile')->name('user.profile');

	Route::get('/videos', 'UserController@video')->name('user.video');

	Route::get('/earnings', 'UserController@earning')->name('user.earning');

	Route::post('/change-profile-picture', 'UserController@updateProfilePicture')->name('user.u.ppicture');

	Route::post('/update-profile', 'UserController@updateProfile')->name('user.u.profile');

	Route::post('/change-password', 'UserController@updatePassword')->name('user.u.password');

	Route::post('/create-video', 'UserController@createVideo')->name('user.v.create');

	Route::get('/delete-video/{id}', 'UserController@deleteVideo')->name('user.v.delete');

	Route::post('/edit-video/{id}', 'UserController@editVideo')->name('user.v.edit');

	Route::get('/watch-list', 'UserController@myWatchList')->name('user.watchlist');

	Route::get('/remove-watch-list/{id}', 'UserController@removeFromWatchList')->name('user.rwatchlist');

	Route::get('/withdraw', 'UserController@withdraw')->name('user.withdraw');

	Route::post('/withdraw', 'UserController@createWithdraw')->name('user.c.withdraw');


});


Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin'], function () {


	// Index Route
    
	Route::get('/', 'AdminController@index')->name('admin.index');

	// User Routes

	Route::get('/users', 'AdminController@users')->name('admin.users');

	Route::get('/unverified-users', 'AdminController@usersUnverified')->name('admin.unv.users');

	Route::get('/create-user', 'AdminController@usersCreate')->name('admin.c.user');

	Route::get('/blocked-users', 'AdminController@usersBlocked')->name('admin.b.users');

	Route::get('/user/{id}/block', 'AdminController@blockUser')->name('admin.b.user');

	Route::get('/user/{id}/unblock', 'AdminController@unblockUser')->name('admin.unb.user');

	Route::get('/user/{id}/verify', 'AdminController@verifyUser')->name('admin.v.user');

	Route::get('/user/{id}/unverify', 'AdminController@unverifyUser')->name('admin.unv.user');

	Route::get('/user/{id}/view', 'AdminController@singleUser')->name('admin.vw.user');

	Route::get('/user/{user}/edit', 'AdminController@editUser')->name('admin.e.user');

	Route::get('/user/{id}/delete', 'AdminController@deleteUser')->name('admin.d.user');

	Route::post('/create-user', 'AdminController@createUserPost')->name('admin.p.user');

	Route::post('/user/{user}/edit', 'AdminController@editUserPost')->name('admin.ep.user');

	Route::post('/users/update-role', 'AdminController@updateUsersRole')->name('admin.upr.users');


	// Tread Routes

	Route::get('/create-tread', 'AdminController@createTread')->name('admin.c.tread');

	Route::post('/create-tread', 'AdminController@createTreadPost')->name('admin.cp.tread');

	Route::get('/treads', 'AdminController@treads')->name('admin.treads');

	Route::get('/publish-treads', 'AdminController@publishTreads')->name('admin.p.treads');

	Route::get('/unpublish-treads', 'AdminController@unPublishtreads')->name('admin.unp.treads');

	Route::get('/tread/{id}/delete', 'AdminController@deleteTread')->name('admin.d.tread');

	Route::get('/tread/{id}/edit', 'AdminController@editTread')->name('admin.e.tread');

	Route::post('/treads/edit', 'AdminController@editTreads')->name('admin.e.treads');

	Route::post('/tread/{tread}/edit', 'AdminController@editTreadPost')->name('admin.ep.tread');

	Route::get('/tread/{id}/publish', 'AdminController@publishTread')->name('admin.p.tread');

	Route::get('/tread/{id}/unpublish', 'AdminController@unpublishTread')->name('admin.unp.tread');


	// Category Routes

	Route::get('/categories', 'AdminController@categories')->name('admin.categories');

	Route::get('/create-category', 'AdminController@createCategory')->name('admin.c.category');

	Route::post('/create-category', 'AdminController@createCategoryPost')->name('admin.p.category');

	Route::get('/category/{id}/delete', 'AdminController@categoyDelete')->name('admin.d.category');


	// Setting Routes


	Route::get('/setting', 'AdminController@setting')->name('admin.setting');

	Route::post('/setting', 'AdminController@editSetting')->name('admin.p.setting');



	// Page Routes

	Route::get('/create-page', 'AdminController@createPage')->name('admin.c.page');

	Route::get('/pages', 'AdminController@pages')->name('admin.pages');

	Route::get('/page/{id}/edit', 'AdminController@editPage')->name('admin.e.page');

	Route::get('/page/{id}/delete', 'AdminController@deletePage')->name('admin.d.page');

	Route::get('/page/{id}/publish', 'AdminController@publishPage')->name('admin.p.page');

	Route::get('/page/{id}/unpublish', 'AdminController@unpublishPage')->name('admin.unp.page');

	Route::post('/create-page', 'AdminController@createPagePost')->name('admin.cp.page');

	Route::post('/page/enable-frontend', 'AdminController@enablePageFrontend')->name('admin.ef.page');

	Route::post('/page/{page}/edit', 'AdminController@editPagePost')->name('admin.ep.page');

	// History Routes

	Route::get('/payments', 'AdminController@payments')->name('admin.payments');

	Route::get('/earnings', 'AdminController@earnings')->name('admin.earnings');

	Route::get('/tread-history', 'AdminController@tHistory')->name('admin.t.history');

	Route::get('/login-history', 'AdminController@lHistory')->name('admin.l.history');

	Route::get('/payment/{id}/approve', 'AdminController@approvePayment')->name('admin.app.payment');

	Route::get('/payment/{id}/delete', 'AdminController@deletePayment')->name('admin.d.payment');


	// Ads Routes

	Route::get('/ads', 'AdminController@ads')->name('admin.ads');

	Route::get('/create-ad', 'AdminController@createAd')->name('admin.c.ad');

	Route::post('/create-ad', 'AdminController@createAdPost')->name('admin.cp.ad');

	Route::get('/ad/{ad}/delete', 'AdminController@deleteAd')->name('admin.d.ad');

	Route::post('/ad/status', 'AdminController@statusAd')->name('admin.s.ads');


});
