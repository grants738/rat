<?php

namespace App\Http\Controllers;

use Mail;
use App\Inquiry;
use App\Mail\ContactCopy;
use Illuminate\Http\Request;


class InquiryController extends Controller
{
    public function showContactView() {
    	return view('contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name' => 'alpha|required',
            'email' => 'email|required',
            'message'  => 'alpha_num|required'
        ]);

    	Inquiry::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'message' => $request->message,
    		'replied_to' => false
    	]);

    	if ($request->copy) {
    		Mail::to($request->email)->send(new ContactCopy($request->name, $request->message));
    	}

    	return redirect('/')->with(['success'=>'Contact Inquiry Successfully Sent! We\'ll get in touch soon...']);
    }
}
