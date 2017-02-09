<?php

namespace App\Http\Controllers;

use Mail;
use App\Inquiry;
use App\Mail\ContactCopy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class InquiryController extends Controller
{
    /*
     * Show the contact view
     */
    public function showContactView() {
    	return view('contact');
    }

    /*
     * Store a new inquiry
     */
    public function postContact(Request $request) {
        // Validate request input
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'message'  => 'required'
        ]);

        // Create new Inquiry and set properties 
    	Inquiry::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'message' => $request->message,
    		'replied_to' => false
    	]);

        // If the inquirer requested an email copy of the inquiry, send the email
    	if ($request->copy) {
    		Mail::to($request->email)->send(new ContactCopy($request->name, $request->message));
    	}

        // Increase the inquiries of this month stat
        Redis::incr('inquiriesThisMonth');

        // Redirect to the home page with success
    	return redirect('/')->with(['success'=>'Contact Inquiry Successfully Sent! We\'ll get in touch soon...']);
    }
}
