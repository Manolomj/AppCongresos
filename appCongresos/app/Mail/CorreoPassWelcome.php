<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoPassWelcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $url, $destinatario, $password;
    
    public function __construct($user, $url, $destinatario, $password)
    {
        $this->user = $user;
        $this->url = $url;
        $this->destinatario = $destinatario;
        $this->password = $password;
    }



    public function build()
    {
        return $this->view('mail.informativo')->subject('Bienvenido a WebCongress!')->with(['user' => 'pepe', 'url' => '123', 'destinatario' => 'qwe', 'password' => 'ddd']);
    }
    
}
