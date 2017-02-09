<?php

namespace App\Http\Controllers;

use Auth;
use Redis;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;

class HomeController extends Controller
{
	/*
	 * Returns the home page and increments the vists stats
	 */
    public function index() {
    	// If not an admin
    	if (Auth::guest()) {
			Redis::incr('visitsToday');
			Redis::incr('visits');
		}	

		// Get quote for page
		$quote = Inspiring::quote();

		// Return view with quote
	    return view('welcome')->with(['quote'=>$quote]);
    }

    /*
     * Returns the news page with posts
     */
    public function news() {
    	// If not an admin
    	if (Auth::guest()) {
			Redis::incr('news');
		}

		// Get news posts and order by date
		$posts = Post::orderBy('created_at','desc')->get();

		// Return view with posts
		return view('news')->with(['posts' => $posts]);
    }

    /*
     * Returns the apps page
     */
    public function apps() {
    	// If not an admin
    	if (Auth::guest()) {
			Redis::incr('apps');
		}

		// Return the apps view
		return view('apps');
    }
}
