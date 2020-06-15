<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'pago'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = $password; //quitar hash para poder loguear 
    }

    
    
    
    // Un usuario accede a varias ponencias
    public function Ponencias() {
        return $this->hasMany('App\Ponencia');
    }
    
    // Un usuario tiene un solo pago
    // public function Pagos() {
        
    //     return $this->belongsTo('App\PagoCongreso');
    // }
    
    
    
    
}
