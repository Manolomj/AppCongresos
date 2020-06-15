<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponencia extends Model
{
    // use SoftDeletes;

    protected $table = 'ponencia';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['iduser', 'titulo', 'video', 'fecha']; 


    // La ponencia es creada por un usuario (ponente)
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
}
