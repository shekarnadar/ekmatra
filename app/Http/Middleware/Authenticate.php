<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
       $guards = empty($guards) ? ['vender'] : $guards;
       echo "exit";
       exit();
        if (Auth::guard('vender')->check()) {
            return $next($request);
        }else if(Auth::guard('admin')->check()){
            return $next($request);
        }else {
            return redirect('login');
        }
                return redirect('login');

    }
}
