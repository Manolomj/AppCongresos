<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoInformativo extends Mailable
{
    use Queueable, SerializesModels;

    // private $user, $url,$destinatario,$password;
    
    // private $asunto = 'WebCongress-Info';
    
    
    public function setSubject($subject)
    {
        $this->asunto = $subject;
    }



    // public function __construct($user, $url, $destinatario, $password)
    // {
    //     $this->user = $user;
    //     $this->url = $url;
    //     $this->destinatario = $destinatario;
    //     $this->password = $password;
    // }

    public function __construct(){
     //   
    }



    public function build()
    {
        
        return $this->view('contacto')->from('izvdaw0@gmail.com')->subject('Correo informativo WebCongress');
        // return $this->view('emails/informativo')->from('phpmanolo@gmail.com')->subject('Correo informativo WebCongress');
    }
    
}
