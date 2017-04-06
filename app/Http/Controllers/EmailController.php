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

    // Send api requests to Send Grid
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.sendgrid.com/v3/contactdb/recipients",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => '[{"email":"' . $request->email . '"}]',
    //   CURLOPT_HTTPHEADER => array(
    //     'authorization: Bearer ' . env('SEND_GRID_API_KEY'),
    //     "content-type: application/json"
    //   ),
    // ));

    // $response = curl_exec($curl);

    // $json = json_decode($response);

    // if (!isset($json)) {
    //     return redirect()->back()->withError('Something went wrong');
    // }

    // $recipient_id = $json->['persisted_recipients'][0];

    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //   return redirect()->back()->withError('Something went wrong.');
    // }

    // // Make second request to add to eagleappteam.com list
    // $list_request = curl_init();

    // curl_setopt_array($list_request, array(
    //   CURLOPT_URL => 'https://api.sendgrid.com/v3/contactdb/lists/' . env('SEND_GRID_LIST_ID') . '/recipients/' . $recipient_id,
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => '[{"email":"' . $request->email . '"}]',
    //   CURLOPT_HTTPHEADER => array(
    //     'authorization: Bearer ' . env('SEND_GRID_API_KEY')
    //   ),
    // ));

    // curl_exec($list_request);
    // $err = curl_error($list_request);

    // curl_close($list_request);

    // if ($err) {
    //   return redirect()->back()->withError('Something went wrong');
    // }

  	// Redirect back with success
  	return redirect()->back()->with(['success' => 'Thanks for signing up!']);
  }
}
