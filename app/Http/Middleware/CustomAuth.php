<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CustomAuth
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
        // $path = $request->path();
        // if(($path=="login" || $path=="register") && Session::get('users'))
        // {
        //     return redirect('/');
        // }
        // else if(($path!="login" && !Session::get('users')) && ($path!="register" && !Session::get('users')))
        // {
        //     return redirect('/login');
        // }
        
        return $next($request);
    }
}
