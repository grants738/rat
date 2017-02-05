<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','adminVerified']);
    }


    public function index() {
    	return view('admin.blogs.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'body' => 'required'
        ]);

    	Blog::create([
    		'name' => $request->user()->name,
    		'title' => $request->title,
    		'description' => $request->description,
    		'body' => $request->body
    	]);

    	return redirect('/blogs')->with('success', 'Sucessfully Posted New Blog Post');
    }

    public function edit(Request $request,$id) {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect('/blogs');
        }

        return view('admin.blogs.create')->with('blog',$blog);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'body' => 'required'
        ]);

        $blog = Blog::find($id);

        if (!$blog) {
            return redirect('/admin');
        }

        $blog->update([
            'name' => $request->user()->name,
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body
        ]);

        return redirect('/blogs')->with('success', 'Updated blog successfully.');
    }

    public function remove($id) {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->back();
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Deleted blog successfully.');
    }
}
