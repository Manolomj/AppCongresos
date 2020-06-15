<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;




class PagoController extends Controller
{
    
    public function create(){
        
        $users = User::where('type', '=', 'suscriptor')->get();
        
        return view('pago')->with(['users'=>$users]);
    }
    
    
    public function uploading(Request $request){
        
        // $prueba = 'llega';
        
        // echo $prueba. '1';
        
        try{
            
            // Documentacion Laravel 7
                // Validating Successful Uploads
                //     In addition to checking if the file is present, you may verify that there were no problems uploading the file via the isValid method:
                    
                //     if ($request->file('photo')->isValid()) {
                //         //
                //     }
                
            // $input = $request->validated();
            
            if($request->file('archivo')->isValid())
            {
                $nombre = $request->iduser . '.pdf' ; // Obtenemos la id y asignamos el nombre del archivo ($id.pdf)
                
                User::whereId($request->iduser)->update(['pago'=>'1']); //Asignamos valor 'true' a la columna de pago
                
                // $file = Input::file('archivo');
                $file = $request->archivo; //Obtenemos el archivo
                
                $file->move('../uploads', $nombre); //par1->ruta donde se va a subir nuestro archivo, par2->nombre de nuestro archivo
            }
        
            
        }catch(\Exception $e){
            
            $request->session()->flash('op', 'pagoError');
            return redirect(url('/ponencia'));
            
        }
        
        $request->session()->flash('op', 'pagoRealizado');
        
        return redirect('/ponencia');
    }
    
}
