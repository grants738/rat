<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class BlogController extends Controller
{

	public function index() {
		$blogs = Blog::orderBy('created_at', 'desc')->get();

		return view('blogs')->with(['blogs'=>$blogs]);
	}

    public function show(Request $request, $id) {
    	$blog = Blog::find($id);

    	if (!$blog) {
    		return redirect('/blogs');
    	}

    	$markdown = Markdown::convertToHtml($blog->body);

    	return view('showBlog')->with(['blog' => $blog, 'markdown' => $markdown]);
    }
}
