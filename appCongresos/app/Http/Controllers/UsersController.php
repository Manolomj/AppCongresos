<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Arr;
use App\Mail\CorreoPassWelcome;
use App\Ponencia;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use App\User;



use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class UsersController extends RegisterController
{
    
    public function __construct()
    {
        $this->middleware('mensajes');
        
        $this->middleware('comite')->only('storePonente');
    }
    
    
    // Creacion de ponentes
    // ===============================
    
    public function createPonente()
    {
        return view('users.ponenteCreate');
    }
    
    public function storePonente(UserRequest $userRequest)
    {
        
    
        try{
            $input = $userRequest -> validated();
            $user = new User($input);
    
            $pass = $user->password;
            $pass = substr(str_shuffle($password), 0, 10);
            $user->password = bcrypt($pass);//importay  
            $user->type = 'ponente';
            
            $url = "http://informatica.ieszaidinvergeles.org:9030/appCongresos/public/password/reset";
            
            $destinatario = $user->email;
            $user->save();
        
            $usern = $user->name;
                
            $destino = $destinatario;
            $correo = new \App\Mail\CorreoInformativo($usern,$url,$destinatario,$password);
        
            \Mail::to($destino)->send($correo);
    
        }catch(\Exception $e) {
        
        
        return redirect(url('/createPonente'));
        
        }
        
        return 'storePonente1';
        
    }

    
    public function storePonente2(Request $request)
    {
        
        // dd($request);
        
        try{

            // PASS ALEATORIO
            // ======================
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $pass = substr(str_shuffle($permitted_chars), 0, 10); //pass aletario
            $request->merge(["password" => $pass,]);
            
            
            // EMAIL INFORMATIVO -> CREDENCIALES
            // ============================================
            
            $url = "http://informatica.ieszaidinvergeles.org:9030/appCongresos/public/password/reset";
            
            $destinatario = $request->email;
            // $user->save();
            
            $user_name = $request->name;
            
            $correo = new \App\Mail\CorreoPassWelcome($user_name, $url, $destinatario, $pass);
        
            \Mail::to($destinatario)->send($correo);
            
            
            // REGISTRO DE PONENTE
            //============================
            event(new Registered($user = $this->createPonenteR($request->all())));
            $request->session()->flash('op', 'ponenteRegistrado');
            // return $this->registered($request, $user) ?: redirect($this->redirectPath('/ponenteCreate'));
            return $this->registered($request, $user) ?: redirect('/ponenteCreate');
    
    
        }catch(\Exception $e) {
            $request->session()->flash('op', 'ponenteNoRegistrado');
            return redirect(url('/ponenteCreate'));
            // return $e;
            // return 'hola, soy el fallo';
        }
        
            return redirect(url('/ponenteCreate'));
            // return var_dump($pass);
            // return $pass;
            // return ($request);
            
            // return $destinatario . $user_name;
    }



    // Creacion de comite
    // ===============================
    
    public function createComite()
    {
        //
    }

    public function storeComite(Request $request)
    {
        //
    }




    // TODOS LOS USUARIOS - BACKEND
    // ==============================
    public function indexUsuarios()
    {
        $users = User::paginate(15);
        
        return view('backend.allUsers')->with('users',$users);
    }












    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $id = $request->idusu;
        $name = $request->nameusu;
        $type = $request->typeusu;
        $idv = $request->idusuv;
        // $idv = $datos[0]->id;
        
        
        
        $datos = DB::table('users')->where('id', $idv)->get();
        
        $namev = $datos[0]->name;
        $typev = $datos[0]->type;
        
        
        
        if( ($id==$idv) && ($namev==$name) && ($typev==$type) ){
            
            $request->session()->flash('op', 'faltanDatos');
            return redirect('/allUsers');
            
        }else{
        
            DB::table('users')->where('id', $idv)->update(['id' => $id, 'name' => $name, 'type' => $type]);
            
            $request->session()->flash('op', 'usuarioActualizado');
            
            return redirect('/allUsers');
        }
        // return $request;
    }

    // Eliminar Uusario
    public function destroyUser(Request $request, $id)
    {
        try{
        // $id =;
        
        
            if(isset((Ponencia::where('iduser', $id)->get())[0]->id)){
         
                DB::table('ponencia')->where('iduser', $id)->delete();
                
            }
            
            
            DB::table('users')->where('id', $id)->delete();
            
            $request->session()->flash('op', 'usuarioEliminado');
            
            // return 'llega aqui?';
            return redirect('/allUsers');
            
        }catch(Exception $e){
            return 'esto no va, gente';
        }
    }
    
    
    public function createUser(Request $request){


        try{
            
            // REGISTRO DE USUARIO
            //============================
            $name = $request->nameusu;
            $email= $request->emailusu;
            $password= $request->passusu;
            $type= $request->typeusu;
            
            $array = array(
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "type"=> $type,
                );
                
            // $request = $array;
            
            $request->merge([
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "type"=> $type,
                    ]);
            
            
            $users = User::all();
            
            $chivato = false;
            
            foreach ($users as $user){
                if($user->email == $email){
                    $chivato = true;
                    break;
                }
            }
            
            if($chivato == false){
                event(new Registered($user = $this->createTwo($request->all())));
                $request->session()->flash('op', 'usuarioRegistrado');
                return $this->registered($request, $user) ?: redirect('/allUsers');
            }else{
                $request->session()->flash('op', 'emailExiste');
                return redirect(url('/allUsers'));
            }

        }catch(Exception $e) {
            // $request->session()->flash('op', 'usuarioNoRegistrado');
            // return redirect(url('/allUsers'));
            return 'error';
        }

        return redirect('/allUsers');

        return $users;
    }
    
    
    
    // PAGOS
    // -----------------------------------------------------
    
    public function indexAllPagos()
    {
        $users = User::paginate(15);
        
        return view('backend.allPagos')->with('users',$users);
    }




    
    public function editPago(Request $request)
    {
        $id = $request->idusu;
        $pago = $request->pagousu;
        
        $datos = User::where('id', $id)->get();
        
        if($pago != $datos[0]->pago){
            User::where('id', $id)->update(['pago' => $pago,]);
            $request->session()->flash('op', 'pagoActualizado');
            return redirect('/allPagos');
        }else{
            $request->session()->flash('op', 'datosNoModificados');
            return redirect('/allPagos');
        }
        
        // DB::table('users')->where('id', $idv)->update(['id' => $id, 'name' => $name, 'type' => $type]);
        
    }
    
    
    
    
    
    // =====================================
    // AJAX
    // =====================================
    
    
    public function ajaxIndexUsuarios()
    {
        // $users = User::paginate(15);
        $users = [];
        
        return view('backend.ajaxAllUsers')->with('users',$users);
    }
    
    
    public function ajaxPeticionAllUser()
    {
        $users = User::paginate(5);
        
        
        
        return response()->json($users);
        
        // return view('backend.ajaxAllUsers')->with('users',$users);
    }
    
    

    
    
    
    
}