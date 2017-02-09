<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
	/*
	 * Store a new email singup
	 */
    public function signUp(Request $request) {
    	// Validate the email
    	$this->validate($request,[
    		'email' => 'email|unique:emails|required'
    	]);

    	// Create the email
    	Email::create([
    		'email' => $request->email
    	]);

    	// Redirect back with success
    	return redirect()->back()->with(['success' => 'Thanks for signing up!']);
    }
}
