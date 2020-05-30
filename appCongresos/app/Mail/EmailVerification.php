<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    

    public $url, $user;
    
    
    public function __construct($user, $url)
    {
        $this->url = $url;
        $this->user = $user;
    }
    
    
    public function build()
    {
        $this->to($this->user);
        return $this->view('mail.verify')->with(['user' => $this->user, 'url' => $this->url]);
    }
}
