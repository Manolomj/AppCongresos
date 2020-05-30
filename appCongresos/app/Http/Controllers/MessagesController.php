<?php

namespace App\Http\Controllers;

// use App\Mail\MessageReceived;
// use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Mail;

class MessagesController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('mensajes');
    }
    
    
    
    // public function contacto(Request $request){
        
    //     $user = \Auth::user();
    //     if($user === null)
    //     {
    //         $name = "nulo";
    //     }
    //     else
    //     {
    //         $name = $user->name;
    //     }
    //     $asunto = $request->subject;
    //     $mensaje = $request->message;
    //     // $email = $request->email;
    //     $email = 'abc@abc.es';//\Auth::user()->email;
        
    //     $emailWC = "phpmanolo@gmail.com";
        
        
    //     $correo = new \App\Mail\MailContacto($name, $asunto, $mensaje, $email);
    
    //     \Mail::to($emailWC)->send($correo);
        
    //     $request->session()->flash('op', 'emailcontact');
        
    //     return redirect('/contacto');
        
    // }
    
    
    // ESTABA EN CONTACTO
            //   @if(\Request::get('mensaje') !== null)
            //     <div class="alert alert-success mensajes" role="alert" style="width:50%!important">
            //         {{\Request::get('mensaje')}}
            //     </div>
            //   @endif 
    
    
    
    
    
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
    
    
    public function index()
    {
        //
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        // var_dump($request);
        
        // Mail::to('izvdaw0@gmail.com')->send(new MessageReceived);
        
        
        // return 'Mensaje enviado';
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
