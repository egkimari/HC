<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Student
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_student) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
