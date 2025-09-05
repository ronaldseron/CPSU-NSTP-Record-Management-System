<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if (!$request->user() || !$request->user()->hasRole($role)) {
            if ($request->user() && $request->user()->isAdmin()) {
                return redirect()->route('dashboard');
            }

            if ($request->user() && $request->user()->isUser()) {
                return redirect()->route('dashboard.users');
            }

            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
