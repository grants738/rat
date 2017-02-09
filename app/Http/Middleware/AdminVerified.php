<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If Admin is logged in
        if (Auth::user()) {
            // If Admin is not verified
            if (Auth::user()->verified == false) {
                // Logout
                Auth::logout();

                // Redirect with message
                return redirect('/')->with(['info'=>'Your Admin Account Has Not Been Verified Yet']);
            }
        }
        
        // If admin is verified and logged in, proceed with next request
        return $next($request);
    }
}
