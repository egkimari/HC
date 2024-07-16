<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LandlordMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_landlord) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have landlord access.');
    }
}
