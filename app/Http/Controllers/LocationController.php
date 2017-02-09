<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewLocation;

class LocationController extends Controller
{
	/*
	 * Store a location from the home page
	 */
	public function store(Request $request) {
		// Create new location
		$location = new ViewLocation;

		// Set properties
		$location->country = $request->query('country');
		$location->state = $request->query('state');
		$location->city = $request->query('city');

		// Save location
		$location->save();
	}
}
