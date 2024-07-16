<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (! $request->user()) {
            return redirect()->route('login'); // Redirect if user not authenticated
        }

        foreach ($roles as $role) {
            if ($role === 'admin' && $request->user()->isAdmin()) {
                return $next($request);
            }
            if ($role === 'landlord' && $request->user()->isLandlord()) {
                return $next($request);
            }
            if ($role === 'student' && !$request->user()->isAdmin() && !$request->user()->isLandlord()) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized.'); // Or redirect to an error page
    }
}
