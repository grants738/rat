<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function signUp(Request $request) {
    	$this->validate($request,[
    		'email' => 'email|unique:emails'
    	]);

    	Email::create([
    		'email' => $request->email
    	]);

    	return redirect()->back()->with(['success' => 'Thanks for signing up!']);
    }
}
