<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\Inquiry;
use Illuminate\Http\Request;
use App\Mail\Reply;

class AdminInquiryController extends Controller
{
	public function __construct() {
		return $this->middleware(['auth','adminVerified']);
	}
    public function showInquiryView() {
    	$inquiries = Inquiry::orderBy('replied_to','asc')->get();
    	return view('admin.inquiries.inquiries')->with(['inquiries'=>$inquiries]);
    }

    public function showReplyView($id) {
    	$inquiry = Inquiry::find($id);
    	return view('admin.inquiries.reply')->with(['inquiry'=>$inquiry]);
    }

    public function reply(Request $request, $id) {
    	$inquiry = Inquiry::find($id);
    	if (!$inquiry) {
    		return redirect('/admin/inquiries')->with(['error'=>'There was a problem replying to the inquiry.']);
    	}
    	$inquiry->update([
    		'replied_to' => true
    	]);
    	Mail::to($inquiry->email)->send(new Reply($inquiry->name, $request->reply, Auth::user()->name));
    	return redirect('/admin/inquiries')->with(['success'=>'Successfully replied to '.$inquiry->name . '\'s inquiry.']);
    }

    public function remove($id) {
    	$inquiry = Inquiry::find($id);
    	if (!$inquiry) {
    		return redirect('/admin/inquiries')->with(['error'=>'There was a problem removing the inquiry.']);
    	}
    	$name = $inquiry->name;
    	$inquiry->delete();
    	return redirect()->back()->with(['success'=>'Successfully Removed'. $name . '\'s Inquiry']);
    }
}
