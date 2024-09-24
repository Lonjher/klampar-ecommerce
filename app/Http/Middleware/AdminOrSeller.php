<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user is admin (role_id == 1) or seller (role_id == 3)
            if ($user->role_id == 1 || $user->role_id == 2) {
                return $next($request); // Allow access
            } else {
                return response()->json(['error' => 'Access denied. Admin or seller role required.'], 403);
            }
        }

        // Redirect to login if not authenticated
        return redirect()->route('login');
    }
}
