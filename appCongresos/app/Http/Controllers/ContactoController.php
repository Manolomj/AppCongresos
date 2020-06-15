<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('mensajes');
    }
    
    
    
    public function index()
    {
        
        // if(session()->has('op'))
        // {
        //     echo 'llega op: ' . session()->get('op');
        // } else
        // {
        //     echo 'no llega op';
        // }
        
        return view('contacto');
    }



    public function correo(Request $request){
        
        $user = \Auth::user();
        if($user === null)
        {
            $name = "nulo";
        }
        else
        {
            $name = $user->name;
        }
        $asunto = $request->subject;
        $mensaje = $request->message;
        // $email = $request->email;
        // $email = 'abc@abc.es';
        
        $email = \Auth::user()->email;
        
        $emailWC = "phpmanolo@gmail.com";
        
        
        $correo = new \App\Mail\MailContacto($name, $asunto, $mensaje, $email);
    
        \Mail::to($emailWC)->send($correo);
        
        $request->session()->flash('op', 'emailcontact');
        
        return redirect('/contacto');
        
    }


    public function verificacionContacto(Request $request){
        
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
        
        
        return redirect('/contacto');
        
    }

}




//----------------------------------------------------------------------------// 
//-----------------------------COMENTARIOS------------------------------------// 
//----------------------------------------------------------------------------// 


    // ESTABA EN CONTACTO
            //   @if(\Request::get('mensaje') !== null)
            //     <div class="alert alert-success mensajes" role="alert" style="width:50%!important">
            //         {{\Request::get('mensaje')}}
            //     </div>
            //   @endif 
    
    
    
    //ENVIO DE CORREO
        
        // public function contact(Request $request){
            
        //     // "name":"Manolo"
        //     // "email":"mjmanolo@gmail.com"
        //     // "subject":"WEBCONGRESINFO"
        //     // "message":"Cara Congreso"
            
        //     $name = $request->name;
        //     $for = $request->email;
        //     $subject= $request->subject;
        //     $message = $request->message;
            
        //     $rr = $request->all();
            
            
        //     $myemail = "izvdaw0@gmail.com";
            
        //     Mail::send('/mail/contact', $request->all(), function($msj) use($name,$subject,$for,$message,$myemail){
        //         $msj->from($for,$name);
        //         $msj->subject($subject);
                
        //         // $msj->with($message);
                
        //         $msj->to($myemail);
        //     });
        //     return redirect()->back();
        // }
        
        // public function contact(Request $request){
        //     $subject = "Asunto del correo";
        //     $for = "correo_que_recibira_el_mensaje@gmail.com";
        //     Mail::send('pruebas/email',$request->all(), function($msj) use($subject,$for){
        //         $msj->from("tucorreo@gmail.com","NombreQueApareceráComoEmisor");
        //         $msj->subject($subject);
        //         $msj->to($for);
        
            //  $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            //  $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
        //     });
        //     return redirect()->back();
        // }
        
