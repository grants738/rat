<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\ViewLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','adminVerified']);
	}
	
    /*
     * Method that renders the dashboard view
     */
    public function showDashboardView() {
    	return view('admin.dashboard');
    }

    /*
     * Show the registered users
     */
    public function showUsersView() {
        // Get the users
    	$users = User::all();

        // Pass the users to the view and render
    	return view('admin.users')->with(['users'=>$users]);
    }

    /*
     * Verify an admin
     */
    public function verify(User $user) {
        // If the user could not be found, redirect back with error
    	if (!$user) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem verifying the user.']);
    	}

        // Update the user's verifiec field to true
    	$user->update([
    		'verified' => true
    	]);

        // Get all the users again
        $users = User::all();

        // Redirect to the users page with success and new users
    	return redirect('/admin/users')->with(['success'=>'Successfully Verified '. $user->name,'users'=>$users]);
    }

     /*
      * Revoke a admin's privliges
      */
    public function revoke(User $user) {
        // Check if user was found or the user is not the super admin
    	if (!$user || $user->id === 1) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem revoking the user.']);
    	}

        // Update the user's verified field to false
    	$user->update([
    		'verified' => false
    	]);

        // Get the updated list of users
        $users = User::all();

        // Redirect to the users page with success and updated list of users
    	return redirect('/admin/users')->with(['success'=>'Successfully revoked '. $user->name,'users'=>$users]);
    }

    /*
     * Remove a user
     */
    public function remove(User $user) {
        // Check if user exists or user is not super admin
    	if (!$user || $user->id === 1) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem removing the user.']);
    	}

        // Delete user
    	$user->delete();

        // Get new list of users
        $users = User::all();

        // Redirect to users page with success and new list of users
    	return redirect('/admin/users')->with(['success'=>'Successfully removed '. $user->name,'users'=>$users]);
    }

    /*
     * Show the site statistics page
     */
    public function showStatsView(){
        // Return the stats view with the statistic data
        return view('admin.stats.stats')->with([
            'views' => Redis::get('visits'),
            'viewsToday' => Redis::get('visitsToday'),
            'news' => Redis::get('news'),
            'apps' => Redis::get('apps'),
            'previousMonth' => Redis::get('inquiriesPreviousMonth'),
            'thisMonth' => Redis::get('inquiriesThisMonth')
        ]);
    }

    /*
     * Show the view location table view
     */
    public function showViewsTableView() {
        // Get all locations
        $locations = ViewLocation::all();

        // Return the view with the locations
        return view('admin.stats.viewsTable')->with(['locations'=>$locations]);
    }

    /*
     * Truncate the locations table
     */
    public function clearViewsTable() {
        ViewLocation::truncate();

        // Redirect back
        return redirect()->back();
    }
}
