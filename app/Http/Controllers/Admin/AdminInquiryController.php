<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Auth;
use App\Inquiry;
use Illuminate\Http\Request;
use App\Mail\Reply;
use App\Http\Controllers\Controller;

class AdminInquiryController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','adminVerified']);
	}

    /*
     * Get the inquiries and pass them to the view
     */
    public function showInquiryView() {
        // Get the inquiries and order them by the replied to date
    	$inquiries = Inquiry::orderBy('replied_to','asc')->get();

        // Return the inquiries and render the view
    	return view('admin.inquiries.inquiries')->with('inquiries',$inquiries);
    }

    /*
     * Find the inquiry by its id and pass it to the view
     */
    public function showReplyView($id) {
        // Find the inquiry by its id
    	$inquiry = Inquiry::find($id);

        // If the inquiry could not be found, redirect to the inquiries page
        if (!$inquiry) {
            return redirect('/admin/inquiries');
        }

        // Return the inquiry and render the view
    	return view('admin.inquiries.reply')->with('inquiry', $inquiry);
    }

    /*
     * Reply to the selected inquiry
     */
    public function reply(Request $request, $id) {
        // Find the inquiry by id
    	$inquiry = Inquiry::find($id);

        // If the inquiry could not be found, redirect back to the inquiries page
    	if (!$inquiry) {
    		return redirect('/admin/inquiries')->with(['error'=>'There was a problem replying to the inquiry.']);
    	}

        // Update the replied_to state to true
    	$inquiry->update([
    		'replied_to' => true
    	]);

        // Mail the reply to the inquiry sender and pass the name of the replier
    	Mail::to($inquiry->email)->send(new Reply($inquiry->name, $request->reply, Auth::user()->name));

        // Redirect back to the inquiries page with success message
    	return redirect('/admin/inquiries')->with(['success'=>'Successfully replied to '.$inquiry->name . '\'s inquiry.']);
    }

    /*
     * Remove the inquiry
     */
    public function remove($id) {
        // Find the inquiry by id
    	$inquiry = Inquiry::find($id);

        // If the inquiry could not be found, redirect back with error
    	if (!$inquiry) {
    		return redirect('/admin/inquiries')->with(['error'=>'There was a problem removing the inquiry.']);
    	}

        // Get the name of the inquirer
    	$name = $inquiry->name;

        // Delete the inquiry
    	$inquiry->delete();

        // Redirect back with success message
    	return redirect()->back()->with(['success'=>'Successfully Removed '. $name . '\'s Inquiry']);
    }
}
