<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_landlord && !Auth::user()->is_admin) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have student access.');
    }
}
