<?php

use App\Post;
use Illuminate\Foundation\Inspiring;
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
	$quote = Inspiring::quote();
    return view('welcome')->with(['quote'=>$quote]);
});

Route::get('/apps', function() {
	return view('apps');
});

Route::get('/news', function() {
	$posts = Post::orderBy('created_at','desc')->get();
	return view('news')->with(['posts' => $posts]);
});

Route::post('/email',"EmailController@signUp");

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

Route::get('/admin', "AdminController@showDashboardView");

Route::get('/admin/users', "AdminController@showUsersView");
Route::get('/admin/users/verify/{id}', "AdminController@verify");
Route::get('/admin/users/revoke/{id}', "AdminController@revoke");
Route::get('/admin/users/remove/{id}', "AdminController@remove");

Route::get('/admin/news', "AdminPostController@showCreateView");
Route::post('/admin/news', "AdminPostController@createNewPost");
Route::get('/admin/news/edit/{id}', "AdminPostController@showEditView");
Route::post('/admin/news/edit/{id}', "AdminPostController@updateNewsPost");

Route::get('/admin/inquiries', "AdminInquiryController@showInquiryView");
Route::get('/admin/inquiries/reply/{id}', "AdminInquiryController@showReplyView");
Route::post('/admin/inquiries/reply/{id}', "AdminInquiryController@reply");
Route::get('/admin/inquiries/remove/{id}', "AdminInquiryController@remove");


