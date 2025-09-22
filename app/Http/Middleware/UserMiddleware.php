<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is authenticated and has the 'admin' user_type
        if (Auth::check() && Auth::user()->user_type === 'user') {
            return $next($request);
        }


        return redirect()
            ->route('user.login')
            ->with('error', 'Unauthorized access.');

    }
}
