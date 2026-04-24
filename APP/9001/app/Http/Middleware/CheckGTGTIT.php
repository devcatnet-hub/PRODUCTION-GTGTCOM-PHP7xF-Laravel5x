<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGTGTIT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::user()->attrib=='inactivo') {
            return redirect('/userlogout');
        }

        if (Auth::user()->group=='GTGTIT' or Auth::user()->group=='root') {
            return $next($request);
        }

        return redirect('/home');
    }
}
