<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::guest() || Auth::user()->isAdmin == 0){
            return redirect(route('welcome')); // можно вернуть 404 ошибку        
       }
        return $next($request);
    }
}
