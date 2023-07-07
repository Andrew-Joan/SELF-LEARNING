<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kalo user belom login
        if (!Auth::check()) return redirect('/')->with('forbidGuest', 'Please login as admin before entering!');
        // kalo user login tapi rolenya bukan admin
        if (auth()->user()->role_id != 2) return redirect('/')->with('forbidUser', 'You do not have permission to access this page!');
        // kalo role user adalah admin
        return $next($request);
    }
}
