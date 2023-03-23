<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
        public function handle(Request $request, Closure $next, ...$guards)

    {
       $guards = empty($guards) ? ['vendor'] : $guards;
      
        if (Auth::guard('vendor')->check()) {
            return $next($request);
        }else if(Auth::guard('admin')->check()){
            return $next($request);
        }else {
            return redirect('login');
        }
                return redirect('login');

    }
}
