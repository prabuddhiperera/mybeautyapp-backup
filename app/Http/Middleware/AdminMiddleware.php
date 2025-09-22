<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current user is authenticated as admin
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return $next($request);
        }

        // If not authenticated as admin, redirect to admin login
        return redirect()
            ->route('admin.login')
            ->with('error', 'Unauthorized access.');
    }
}
