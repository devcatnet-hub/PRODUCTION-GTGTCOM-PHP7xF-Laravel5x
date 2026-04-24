<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGTBS
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

        if (Auth::user()->group=='GTBS' or Auth::user()->group=='root' or Auth::user()->group=='GTGTIT') {
            return $next($request);
        }

        return redirect('/home');
    }
}
