<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if (Auth::check()) {
            return redirect('/user/home'); // Redirects to user/home URL
        }

        if (Auth::guard($guard)->check()) {
            return redirect('/user/home'); // Redirect authenticated users to /home or any other route
        }
        return $next($request);
    }
}
