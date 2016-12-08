<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','adminVerified']);
	}
	
    public function showDashboardView() {
    	return view('admin.dashboard');
    }

    /*
     * Users Methods Section
     */

    public function showUsersView() {
    	$users = User::all();
    	return view('admin.users')->with(['users'=>$users]);
    }

    public function verify($id) {
    	$user = User::where('id',$id);
    	if (!$user) {
    		dd("nope");
    		//return redirect()->back();
    	}
    	$user->update([
    		'verified' => true
    	]);
    	return redirect()->back();
    }

     public function revoke($id) {
    	$user = User::where('id',$id);
    	if (!$user) {
    		return redirect()->back();
    	}
    	$user->update([
    		'verified' => false
    	]);
    	return redirect()->back();
    }

     public function remove($id) {
    	$user = User::where('id',$id);
    	if (!$user) {
    		return redirect()->back();
    	}
    	$user->delete();
    	return redirect()->back();
    }

    /*
     * Contacts Methods Section
     */
    public function showContactView() {

    }
}
