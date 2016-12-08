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
        if (Auth::user()) {
            if (Auth::user()->verified == false) {
                Auth::logout();
                return redirect('/')->with(['info'=>'Your Admin Account Has Not Been Verified Yet']);
            }
        }
        
        return $next($request);
    }
}
