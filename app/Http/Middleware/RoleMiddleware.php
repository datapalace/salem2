<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check specific guard based on role
        $guard = match ($role) {
            'admin' => 'admin',
            'customer' => 'customer',
            'subscriber' => 'subscriber',
            default => 'web'
        };

        if (Auth::guard($guard)->check() && Auth::guard($guard)->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
