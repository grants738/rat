<?php

namespace App\Http\Controllers;

use App\User;
use App\ViewLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
    	$user = User::find($id);
    	if (!$user) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem verifying the user.']);
    	}
    	$user->update([
    		'verified' => true
    	]);
        $users = User::all();
    	return redirect('/admin/users')->with(['success'=>'Successfully Verified '. $user->name,'users'=>$users]);
    }

     public function revoke($id) {
    	$user = User::find($id);
    	if (!$user || $user->id = 1) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem revoking the user.']);
    	}
    	$user->update([
    		'verified' => false
    	]);
        $users = User::all();
    	return redirect('/admin/users')->with(['success'=>'Successfully revoked '. $user->name,'users'=>$users]);
    }

     public function remove($id) {
    	$user = User::find($id);
    	if (!$user || $user->id = 1) {
    		return redirect('/admin/users')->with(['error'=>'There was a problem removing the user.']);
    	}
    	$user->delete();
        $users = User::all();
    	return redirect('/admin/users')->with(['success'=>'Successfully removed '. $user->name,'users'=>$users]);
    }

    public function showStatsView(){
        return view('admin.stats')->with([
            'views' => Redis::get('visits'),
            'viewsToday' => Redis::get('visitsToday'),
            'news' => Redis::get('news'),
            'apps' => Redis::get('apps'),
            'previousMonth' => Redis::get('inquiriesPreviousMonth'),
            'thisMonth' => Redis::get('inquiriesThisMonth')
        ]);
    }

    public function showViewsTableView() {
        $locations = ViewLocation::all();
        return view('admin.viewsTable')->with(['locations'=>$locations]);
    }

    public function clearViewsTable() {
        ViewLocation::truncate();
        return redirect()->back();
    }

    public function showBlogAndPostsView() {
        return view('admin.news.index');
    }
}
