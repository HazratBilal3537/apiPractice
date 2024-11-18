<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        $user = Auth::user();
            // Check if the user is authenticated and has the required role
            if (!$user || $user->role !== $role) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

        return $next($request);
    }
}
