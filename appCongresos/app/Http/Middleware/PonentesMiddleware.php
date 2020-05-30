<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class PonentesMiddleware
{
    
    public function handle($request, Closure $next){
        
        if(Auth::check() && Auth::User()->type=='ponente'){
            
            return $next($request);
            
        }
        
        return redirect(url('/'));
        // return $next($request);
    }
}
