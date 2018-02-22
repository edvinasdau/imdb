<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MultiAuth
{

    public function handle($request, Closure $next, $guard = null)
    {
       if (Auth::guard($guard)->check() && $request->user()->role == 'admin'){
        return $next($request);
    }
        return redirect ('/');
    }
}
