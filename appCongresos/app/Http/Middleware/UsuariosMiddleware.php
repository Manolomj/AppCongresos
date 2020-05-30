<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class UsuariosMiddleware
{
    
    public function handle($request, Closure $next){
        
        if(Auth::check() && Auth::User()->type=='suscriptor'){
            
            // return redirect(url('/'));
            return $next($request);
            
        }else 
        
            return redirect(url('/'));
            // return $next($request);
        
    }
}
