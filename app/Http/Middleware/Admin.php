<?php

namespace App\Http\Middleware;

use Closure;

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
        if(!\Auth::check()||!\Auth::user()->is_admin) 
            {  
                
                return redirect('/posts')->with('error','you must be the admin to see that resource');
            }
        return $next($request);
    }
}
