<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Mensajes
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
        $mensajes = [
            'registrado'			=> 'Usuario registrado, dirijase a su correo para verficar.',
            'logueado'				=> 'Bienvenido',
    		'logueadoSinVerificar'	=> 'Bienvenido, todavía no has verificado tu cuenta',
            'verificado'			=> 'Usuario verificado.',
            'emailcontact'     		=> 'Tu correo ha sido enviado satisfactoriamente!',
        ];
        
        $opSession = $request->session()->get('op');
        $alertMessage = null;
        
        if (isset($mensajes[$opSession])) {
            $alertMessage = $mensajes[$opSession];
            // $request->session()->forget('op');
        }
        
        
        $request['mensaje'] = $alertMessage;
        return $next($request);
    }
}
