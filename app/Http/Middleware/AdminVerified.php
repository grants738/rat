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
        if (Auth::user()->verified == false) {
            Auth::logout();
            return redirect('/');
        }
        return $next($request);
    }
}
