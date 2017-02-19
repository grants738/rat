<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPostController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','adminVerified']);
	}

    /*
     * Return the news post creation view
     */
    public function showCreateView() {
    	return view('admin.news.create');
    }

    /*
     * Return the post edit view
     */
    public function showEditView(Post $post) {
        // If the post could not be found, redirect with error
        if (!$post) {
            return redirect('/admin/news')->with(['error'=>'An error occured trying to edit the post.']);
        }

        // Return the edit view with the post data
        return view('admin.news.edit')->with(['post'=>$post]);
    }

    /*
     * Create a new news post
     */
    public function createNewPost(Request $request) {
        // Validate request input
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image_url' => 'file'
        ]);

        // Set image_url to null
    	$image_url = null;

        // If the request has an image, store it and set the image_path
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->store('public/news');
    		$image_url = Storage::url($path);
    	}

        // Create the post and set the properties
    	Post::create([
    		'title' => $request->title,
    		'body' => $request->body,
    		'image_url' => $image_url
    	]);

        // Redirect to the news page with success
    	return redirect('news')->with(['success' => 'Successfully Created New News Post']);
    }

    /*
     * Update a news post
     */
    public function updateNewsPost(Request $request, Post $post) {
        // Find post by id
        // $post = Post::find($id);

        // If the post could not be found, redirect with error
        if (!$post) {
            return redirect('/news')->with(['error'=>'There was a problem updating the post.']);
        }

        // Update the post with the request data
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        // If the request has a new image, find the old one and delete it
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($post->image_url);

            // Store and get path of new image
            $path = $request->file('image')->store('public/news');
            $image_url = Storage::url($path);

            // Update the image property of the post
            $post->update([
                'image_url' => $image_url
            ]);
        }

        // Redirect to news page with success
        return redirect('/news')->with(['success'=>'News Post Successfully Updated']);
    }

    /*
     * Delete a news post
     */
    public function remove(Post $post) {
        // Find news post by id
        // $post = Post::find($id);

        // If news post could be found, redirect with error
        if (!$post) {
            return redirect()->back()->with(['error'=>'There was a problem removing the news post.']);
        }

        // Delete post
        $post->delete();

        // Redirect with success
        return redirect()->back()->with(['success'=>'Successfully Removed News Post']);
    }

}
