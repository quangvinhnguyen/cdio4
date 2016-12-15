<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkPay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'khachhangs')
    {
        if(Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect('/Trangchu');
    }
}
