<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $privilege)
    {
      
        if($privilege == 'admin' && auth()->user()->level == 'admin'){
            return $next($request);
        }else if($privilege == 'siswa' && auth()->user()->level == 'siswa'){       
            return $next($request);
        }else if($privilege == 'admin&siswa'){
            if(auth()->user()->level == 'admin'){
                  return $next($request);
             }else if(auth()->user()->level == 'siswa'){
                  return $next($request);
             }
        }
          
        return back();
    }
}
