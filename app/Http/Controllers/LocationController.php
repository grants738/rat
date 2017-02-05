<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewLocation;

class LocationController extends Controller
{
	public function store(Request $request) {
		$location = new ViewLocation;
		$location->country = $request->query('country');
		$location->state = $request->query('state');
		$location->city = $request->query('city');
		$location->save();
	}
}
