<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->attrib=='inactivo') {
            return redirect('/userlogout');
        }

        return $next($request);
    }
}
