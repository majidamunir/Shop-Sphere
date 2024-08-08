<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next, $role)
//    {
//        $user = Auth::user();
//
//        if ($user->role === 'shop_owner') {
//            // Shop owners have access to all pages
//            return $next($request);
//        }
//
//        if ($role === 'dashboard' && $user->role !== 'shop_owner') {
//            // Shopkeepers and customers do not have access to the dashboard
//            return redirect()->route($user->role . '.page')->with('error', 'Access denied.');
//        }
//
//        if ($role !== $user->role) {
//            // Deny access if the role does not match
//            return redirect()->route($user->role . '.page')->with('error', 'Access denied.');
//        }
//
//        return $next($request);
////    }
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // If the user is not authenticated, redirect to login page
        if (!$user) {
            return redirect()->route('login');
        }

        // Shop owners have access to all pages
        if ($user->role === 'shop_owner') {
            return $next($request);
        }

        // Restrict access to the user's specific page
        if ($role !== $user->role) {
            return redirect()->route($user->role . '.page')->with('error', 'Access Denied.');
        }

        return $next($request);
    }
}
