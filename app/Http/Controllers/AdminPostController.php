<?php

namespace App\Http\Controllers;

use Storage;
use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','adminVerified']);
	}

    public function showCreateView() {
    	$posts = Post::all();
    	return view('admin.news.create');
    }

    public function createNewPost(Request $request) {
    	$image_url = null;
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->store('public/news');
    		$image_url = Storage::url($path);
    	}
    	Post::create([
    		'title' => $request->title,
    		'body' => $request->body,
    		'image_url' => $image_url
    	]);

    	return redirect('/admin/news')->with(['success' => 'Successfully Created New News Post']);
    }
}
