<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Check if the user is an admin
            if ($user->role === 'admin') {
                // If user is admin, proceed with the request
                return $next($request);
            }
            // If user is not an admin, redirect with error message
            return redirect('/')->with('error', 'Your account does not have the necessary permissions.');
        }
        
        return route('login');
    }
}
