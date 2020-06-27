<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::user()) {
            // User role
            $role = Auth::user()->role; 
        
            // Check user role
            switch ($role) {
                case 'admin':
                    return redirect()->route('adminIndex');
                break;
                case 'user':
                    return redirect()->route('userIndex');
                break; 
                default:
                    return redirect()->route('login');
                break;
            }
        }

        return $next($request);
    }
}
