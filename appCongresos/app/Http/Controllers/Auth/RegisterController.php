<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['nullable'],
            'pago' => ['nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
            'type'  => $data['type'] = 'suscriptor',
            'pago' => $data['pago'] = false,
        ]);
    }
    
    protected function createTwo(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
            'type'  => $data['type'],
            'pago' => $data['pago'] = false,
        ]);
    }
    
    protected function createPonenteR(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
            'type'  => $data['type'] = 'ponente',
            'pago' => $data['pago'] = false,
        ]);
    }
     
    protected function createComiteR(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
            'type'  => $data['type'] = 'comite',
            'pago' => $data['pago'] = false,
        ]);
    }
    
    
    
    
    public function register(Request $request) {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        $request->session()->flash('op', 'registrado');
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
    
    
    
    public function registerPonente(Request $request) {
        try{
            // $this->validator($request->all())->validate();
            event(new Registered($user = $this->createPonente($request->all())));
            $this->guard()->login($user);
            // $request->session()->flash('op', 'Ponenteregistrado');
            $this->registered($request, $user);
            
        }catch (Exception $e){
            return 'no funciona el register';
        }
        
        return true;
    }
    
    
    
}
