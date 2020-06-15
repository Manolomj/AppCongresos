<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ponencia;
use App\Traits\TraitComun;
use App\Http\Requests\PonenciaRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/*

Otra forma de hacerlo (herencias):

    class ComunController extends Controller{ Metemos los metodos que tengan ambos en comun }
    
    class AdminPonenciaController extends ComunController{ Se suman los de ComunController }
*/

class PonenciaController extends Controller
{
    
    use TraitComun;
        // Acceso a funciones de trait
        // $this->altaPonencia();
    
    
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('ponente')->only('create');
        
        $this->middleware('mensajes');
        
    }
    
    public function index()
    {
        
        $usuarios = User::where('type', '=', 'ponente')->get();
        
        // El pago para acceder a las ponencias -> hacer
        
        $ponencias = Ponencia::paginate(5);
        
        return view('ponencias.allponencias')->with(['users'=>$usuarios, 'ponencias'=>$ponencias]);
        // return $ponencias;
    }

    public function create()
    {
        // Aqui con un if comparando el tipo de usuario podemos llamarlo desde el backend tambien!!!
        // · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · ·
        // FRONTING -> USER = PONENTE -> Pagina de creacion de ponencias
        
        
        
        $users = User::where('type', '=', 'ponente')->get();
        
        return view('ponencias.ponenciaCreate')->with(['users'=>$users]);
    }

        // return 'Llega';
        
    public function store(PonenciaRequest $ponenciaRequest)
    {
        $po = $ponenciaRequest -> validated();
        $ponencia = new Ponencia($po);

        try{
            
            $result = $ponencia -> save();
        

        }catch(\Exception $e) {
        

            $ponenciaRequest->session()->flash('op', 'ponenciaNoCreada');
            return redirect(url('/ponencia/create'));
        
        }
        
        $ponenciaRequest->session()->flash('op', 'ponenciaCreada');
        return redirect(url('/ponencia/create'));
    }


    
    public function verificacion(Request $request){
        
        $user = \Auth::user();
        
        if($user === null)
        {
            $request->session()->flash('op', 'usuarioSinLoguear');
        }
        else
        {
            $user->sendEmailVerificationNotification();
            $request->session()->flash('op', 'correoVerificiacion');
        }
        
        
        return redirect('/ponencia');
        
    }
    
    
    // ---------------------------------------------------------------------
    // BACKEND
    // ---------------------------------------------------------------------
    
    
    
    
    public function indexPonencias()
    {
        $ponencias = Ponencia::paginate(15);
        
        return view('backend.allPonencias')->with('ponencias',$ponencias);
    }

    
    // Eliminar Ponencia
    public function destroyPonencia(Request $request, $id)
    {
        try{
            
            Ponencia::where('id', $id)->delete();
     
            $request->session()->flash('op', 'ponenciaEliminada');
            
            return redirect('/allPonencias');
            
        }catch(Exception $e){
            $request->session()->flash('op', 'ponenciaNoEliminada');
            return redirect('/allPonencias');
        }
    }
    
    
    // Editar ponnencia
    public function updatePonencia(Request $request)
    {
        $idv = $request->idponv;
        $id = $request->idpon;
        $iduser = $request->idponusu;
        $titulo = $request->namepon;
        $video = $request->urlpon;
        $fecha = $request->fechapon;
        
        
        // $video = str_replace("watch?v=","embed/", $video);
            
        
        $datos = DB::table('ponencia')->where('id', $idv)->get();
        
        $iduserv = $datos[0]->iduser;
        $titulov = $datos[0]->titulo;
        $videov = $datos[0]->video;
        $fechav = $datos[0]->fecha;
        
        $existeUsuario = DB::table('users')->where('id', $iduser)->get();
        
        if($existeUsuario != '[]'){
        
            if( ($id==$idv) && ($iduser==$iduserv) && ($titulo==$titulov) && ($video==$videov) && ($fecha==$fechav) ){
                
                $request->session()->flash('op', 'faltanDatos');
                return redirect('/allPonencias');
                
            }else{
            
                DB::table('ponencia')->where('id', $idv)->update(['id' => $id, 'iduser' => $iduser, 'titulo' => $titulo, 'video' => $video, 'fecha' => $fecha]);
                
                $request->session()->flash('op', 'ponenciaActualizada');
                
                return redirect('/allPonencias');
            }
            // return $existeUsuario;
            
        }else{
            
            $request->session()->flash('op', 'usuarioNoExiste');
            
            return redirect('/allPonencias');
        }
    }
    
    
    
    
    
    
    public function createPonencia(Request $request)
    // public function createPonencia(PonenciaRequest $ponenciaRequest)
    {
     

        try{
            $id = $request->idpon;
            $iduser = $request->idponusu;
            $titulo = $request->namepon;
            $video = $request->urlpon;
            
            // $video = str_replace("watch?v=","embed/", $video); //Cambiado ya en JQuery antes de reproducir
            
            $fecha = $request->fechapon;
            
            $datos = array(
                    "id" => $id,
                    "iduser" => $iduser,
                    "titulo" => $titulo,
                    "video" => $video,
                    "fecha" => $fecha,
                );
            
            
            $ponenciaRepetida = Ponencia::where("id", $id)->get();
            
            $exreg = '(https?:\/\/)(www\.)youtube(\.com)\/(watch\?v=|embed\/).*';
            
            // $resultpt = Str::is($exreg, $video);
            
            // https://www.youtube.com/watch?v=MhZDYjQCl50
            
            
            
            $resultwatch = Str::of($video)->is('https://www.youtube.com/watch?v=*');
            
            
            if( $resultwatch != 1 ){
                
                $request->session()->flash('op', 'urlNoValida');
                return redirect(url('/allPonencias'));
                
            }else if($ponenciaRepetida == '[]'){
                
                Ponencia::insert($datos);
                
                $request->session()->flash('op', 'ponenciaCreada');
                return redirect(url('/allPonencias'));
                // return 'llega al create';
                
            }else{
                
                $request->session()->flash('op', 'ponenciaRepetida');
                return redirect(url('/allPonencias'));
                // return 'llega al repetido';
            }

        }catch(Exception $e) {
        

            // $ponenciaRequest->session()->flash('op', 'ponenciaNoCreada');
            // return redirect(url('/ponencia/create'));
            return 'Aqui hay error bro';
        }
        
    }


    
    
}
