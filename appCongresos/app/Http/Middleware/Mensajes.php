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
            'correoVerificiacion'   => 'Email de verificación enviado con éxito.',
            'datosNoModificados'    => 'No has realizado ninguna modificación.',
            'emailcontact'     		=> 'Tu correo ha sido enviado satisfactoriamente!',
            'emailExiste'     		=> 'Este correo ya está en uso, inténtelo de nuevo',
            'logueado'				=> 'Bienvenido',
    		'logueadoSinVerificar'	=> 'Bienvenido, todavía no has verificado tu cuenta',
    		'pagoActualizado'       => 'El pago ha sido modificado con éxito',             
    		'pagoRealizado'         => 'Pago realizado con éxito',             
    		'pagoError'             => 'Se ha producido un error en el pago, vuelva a intentarlo más tarde. ',             
            'ponenciaActualizada'   => 'La ponencia ha sido actualizada con éxito.',
            'ponenciaCreada'        => 'La ponencia ha sido creada con éxito.',
            'ponenciaRepetida'      => 'Error en id ponencia, el introducido ya está en uso.',
            'ponenciaNoCreada'      => 'La ponencia no ha sido creada, vuelve a intentarlo más tarde.',
            'ponenciaEliminada'     => 'La ponencia ha sido eliminada con éxito.',
            'ponenciaNoEliminada'   => 'La ponencia no ha podido ser eliminada.',
            'ponenteRegistrado'     => 'El ponente ha sido registrado con éxito.',
            'ponenteNoRegistrado'   => 'El ponente no ha sido creado, vuelve a intentarlo más tarde.',
            'registrado'			=> 'Usuario registrado, dirijase a su correo para verficar.',
            'usuarioActualizado'	=> 'El usuario ha sido actualizado con éxito.',
            'usuarioNoExiste'	    => 'La id de creador introducida no existe, intentelo de nuevo.',
            'faltanDatos'           => 'No se ha realizado ningún cambio en el usuario',
            'usuarioSinLoguear'		=> 'Para esta opción debes iniciar sesión primero.',
            'usuarioEliminado'		=> 'El usuario ha sido eliminado con éxito.',
            'usuarioRegistrado'		=> 'El usuario ha sido creado con éxito.',
            'urlNoValida'		    => 'La URL del video no es válida. (Debe tener el formato: https://www.youtube.com/watch?v=)',
            
            'verificado'			=> 'Usuario verificado.',
        ];
        
        $opSession = $request->session()->get('op');
        // $request->session()->forget('op');
        $alertMessage = null;
        
        if (isset($mensajes[$opSession])) {
            $alertMessage = $mensajes[$opSession];
            // $request->session()->forget('op');
        }
        
        
        $request['mensaje'] = $alertMessage;
        return $next($request);
    }
}
