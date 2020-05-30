<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContacto extends Mailable
{
    use Queueable, SerializesModels;


    private $name, $mensaje, $email, $asunto;
    

    public function __construct($name, $asunto, $mensaje, $email){
    	
        $this->name    = $name;
        $this->asunto  = $asunto;
        $this->mensaje = $mensaje;
        $this->email   = $email;
    }




    public function build()
    {
        // return $this->view('mail.contact')->subject($this->asunto)->with(['name' => $this->name, 'asunto' => $this->asunto , 'mensaje' => $this->mensaje , 'email' => $this->email]);
        return $this->view('mail.contact')->subject('Contacto')->with(['name' => $this->name, 'asunto' => $this->asunto , 'mensaje' => $this->mensaje , 'email' => $this->email]);
    }
}
