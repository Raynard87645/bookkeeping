<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class authanticatedMiddleware
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
       if(Auth::check())
          return $next($request);
         
         return redirect('/login');
        // @If(Auth::check())  return $next($request); @else return redirect('/login'); @endif

    }
}
