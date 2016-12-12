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
    	return view('admin.news.create');
    }

    public function showEditView($id) {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/admin/news')->with(['error'=>'An error occured trying to edit the post.']);
        }
        return view('admin.news.edit')->with(['post'=>$post]);
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

    	return redirect('news')->with(['success' => 'Successfully Created New News Post']);
    }

    public function updateNewsPost(Request $request, $id) {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/news')->with(['error'=>'There was a problem updating the post.']);
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        if ($request->hasFile('image')) {
            Storage::delete($post->image_url);
            $path = $request->file('image')->store('public/news');
            $image_url = Storage::url($path);
            $post->update([
                'image_url' => $image_url
            ]);
        }

        return redirect('/news')->with(['success'=>'News Post Successfully Updated']);
    }

    public function remove($id) {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with(['error'=>'There was a problem removing the news post.']);
        }
        $post->delete();
        return redirect()->back()->with(['success'=>'Successfully Removed News Post']);
    }

}
