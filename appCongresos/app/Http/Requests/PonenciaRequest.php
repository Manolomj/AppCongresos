<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PonenciaRequest extends FormRequest
{
    
    
    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';
        $date       =   'El campo :attribute tiene que ser de tipo fecha (dd/mm/aa)';
        $min        =   'La longitud mínima del :attribute es :min';
        $max        =   'La longitud máxima del :attribute es :max';

        
        
        return [
                // Id usuario
                'iduser.required'           =>  $required,
                
                // Titulo
                'titulo.required'           =>$required,
                'titulo.max'                =>$max,
                'titulo.min'                =>$min,
                
                // Video
                'video.required'      =>$required,
                'video.min'           =>$min,
    
                // Fecha
                'fecha.date'                =>$date,
        ];
    }



    public function rules()
    {
        return [
                'iduser'        =>  'required',
                'titulo'        =>  'required|max:100|min:10',
                'video'         =>  'required|min:5',
                'fecha'         =>  'date'
        ];
    }
}
