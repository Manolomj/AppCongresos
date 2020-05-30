<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
        logout as performLogout;
    }
    

    // use AuthenticatesUsers;
    
    
    
    protected $redirectTo = '/';
    
    
    // protected function authenticated(Request $request, $user){
        
        
    // }
    
    
    


    
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('mensajes');
    }
    
    
    
    public function login(Request $request) {
        
        $this->validateLogin($request);
        
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        if ($this->attemptLogin($request)) {
            $user = \Illuminate\Support\Facades\Auth::user();
            
            if($user->type === 'suscriptor'){
                if($user->hasVerifiedEmail()) {
                    // Logeado y verificado  
                    $request->session()->flash('op', 'logueado');
                    return $this->sendLoginResponse($request);
                } else {
                    // Logueado y no verificado
                    $request->session()->flash('op', 'logueadoSinVerificar');
                    $user->sendEmailVerificationNotification();
                    return $this->sendLoginResponse($request);
                    // Para hacer logout
                    // \Illuminate\Support\Facades\Auth::logout();
                }
            }
            
        }
        
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
        
    }
    
}
    
    