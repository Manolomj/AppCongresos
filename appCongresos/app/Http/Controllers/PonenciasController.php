<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PonenciasController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('ponente')->only('create');
        
    }
    
    public function index()
    {
        //FRONTING -> Todas las ponencias creadas
        return view('ponencias.allponencias');
    }

    public function create()
    {
        // Aqui con un if comparando el tipo de usuario podemos llamarlo desde el backend tambien!!!
        // · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · ·
        // FRONTING -> USER = PONENTE -> Pagina de creacion de ponencias
        return view('ponencias.ponenciasCreate');
    }

        // return 'Llega';
        
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //  Muestra la ponencia con ese id
    }


    public function edit($id)
    {
        //  Edita la ponencia con ese id
    }


    public function update(Request $request, $id)
    {
        //  Edita la ponencia con ese id
    }

    public function destroy($id)
    {
        //  Elimina la ponencia con ese id
    }
}
