<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCongresoRequest extends FormRequest
{
    
    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';
        $email      =   'El campo :attribute debe de ser de tipo email';
        $date       =   'El valor del campo :attribute debe de ser de tipo fecha';
   

        
        
        return [
                'name.required'          => $required,
                'email.required'         => $required,
                'email.email'            => $email,
                'password.required'      => $required,
                'type.required'          => $required,
        ];
    }


    public function rules()
    {
        return [
            'name'      =>  ['required', 'string', 'max:255'],
            'email'     =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
            'type'      =>  'required',
            'pago'      =>  ['nullable'],
        ];
    }
}
