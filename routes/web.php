<?php

use App\Post;
use Illuminate\Support\Facades\DB;
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

Route::get('/apps', function() {
	return view('apps');
});

Route::get('/news', function() {
	$posts = Post::orderBy('created_at','desc')->get();
	return view('news')->with(['posts' => $posts]);
});

Route::get('/contact', function() {
	return view('contact');
});

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


