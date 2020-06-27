<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserCheck
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
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        if(Auth::user()->role == "user") {
            // OK   
        }

        else if (Auth::user()->role == "admin") {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
