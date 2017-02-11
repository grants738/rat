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

/*
 * Home routes
 */
Route::get('/', "HomeController@index");
Route::get('/apps', "HomeController@apps");
Route::get('/news', "HomeController@news");

/*
 * Route for getting email signup
 */
Route::post('/email',"EmailController@signUp");

/*
 * Contact routes
 */
Route::get('/contact', "InquiryController@showContactView");
Route::post('/contact', "InquiryController@postContact");

/*
 * Admin Auth Routes
 */
Route::get('/admin/register', "Auth\RegisterController@showRegistrationForm");
Route::get('/admin/login', "Auth\LoginController@showLoginForm");
Route::post('/admin/register', "Auth\RegisterController@register");
Route::post('/admin/login', "Auth\LoginController@login");
Route::post('/admin/logout', "Auth\LoginController@logout");


/*
 * Admin Routes
 */
Route::group(['namespace' => 'Admin'], function () {
	/*
	 * Dashboard
	 */
    Route::get('/admin', "AdminController@showDashboardView");

    /*
     * User control
     */
	Route::get('/admin/users', "AdminController@showUsersView");
	Route::get('/admin/users/verify/{user}', "AdminController@verify");
	Route::get('/admin/users/revoke/{user}', "AdminController@revoke");
	Route::get('/admin/users/remove/{user}', "AdminController@remove");

	/*
	 * News post control
	 */
	Route::get('/admin/news', "AdminPostController@showCreateView");
	Route::post('/admin/news', "AdminPostController@createNewPost");
	Route::get('/admin/news/edit/{post}', "AdminPostController@showEditView");
	Route::post('/admin/news/edit/{post}', "AdminPostController@updateNewsPost");
	Route::get('/admin/news/remove/{post}', "AdminPostController@remove");

	/*
	 * Inquiry Control
	 */
	Route::get('/admin/inquiries', "AdminInquiryController@showInquiryView");
	Route::get('/admin/inquiries/reply/{inquiry}', "AdminInquiryController@showReplyView");
	Route::post('/admin/inquiries/reply/{inquiry}', "AdminInquiryController@reply");
	Route::get('/admin/inquiries/remove/{inquiry}', "AdminInquiryController@remove");

	/*
	 * Stats control
	 */
	Route::get('/admin/stats', 'AdminController@showStatsView');
	Route::get('/admin/stats/table', 'AdminController@showViewsTableView');
	Route::get('/admin/stats/table/clear', 'AdminController@clearViewsTable');
});

/*
 * Location route
 */
Route::get('/loc', 'LocationController@store');
