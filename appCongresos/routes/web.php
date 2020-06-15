<?php

use Illuminate\Support\Facades\Route;


// Auth::routes();
Auth::routes(['verify' => true]);


// TODOS
        
Route::get('/', 'VistasController@index')->name('home');

Route::get('/contacto', 'ContactoController@index')->name('contacto'); 


// NO LOGUEADOS

Route::get('/about', 'VistasController@about')->name('about');


// AUTENTIFICADOS

Route::get('/pagos', 'VistasController@pagos')->name('pagos');




//ADMIN

Route::get('/admin', 'AdminController@index')->name('admin');



//CORREO
Route::post('/contacto', 'ContactoController@correo'); 




//PONENCIAS

Route::resource('ponencia', 'PonenciaController');






//PRUEBA
Route::get('/prueba', 'VistasController@prueba')->name('prueba');


//Contacto.blade -> Reenvío de verificación
Route::get('/contactoR', 'ContactoController@verificacionContacto');

//allponencias.blade -> Reenvío de verificación
Route::get('/ponenciaR', 'PonenciaController@verificacion');


// PAGO de ponencias -> pagos.blade.php
Route::get('/pago', 'PagoController@create');
Route::post('/pagoStore', 'PagoController@store');

// ARCHIVO
Route::post('uploading/', 'PagoController@uploading');



// CREACION DE USUARIOS

Route::get('/ponenteCreate', 'UsersController@createPonente')->name('ponenteCreate');
Route::post('/ponenteCreate', 'UsersController@storePonente2');





// =============================================================================
// BACKEND
// =============================================================================


// USUARIOS

    // Todos los usuarios
    Route::get('/allUsers', 'UsersController@indexUsuarios')->name('allUsers');
    
    
    // Eliminar a un usuario
    // Route::delete('/destroyUser/{$id}', 'UsersController@destroyUser');
    Route::get('/destroyUser/{id}', 'UsersController@destroyUser');
    
    // Editar un usuario
    Route::get('/editUser/{id}', 'UsersController@updateUser');
    
    // Crear un usuario
    Route::get('/createUser', 'UsersController@createUser');


// PONENCIAS

    // Todas las ponencias
    Route::get('/allPonencias', 'PonenciaController@indexPonencias')->name('allPonencias');
    
    // Eliminar a un usuario
    Route::get('/destroyPonencia/{id}', 'PonenciaController@destroyPonencia');
    
    // Editar un usuario
    Route::get('/editPonencia/{id}', 'PonenciaController@updatePonencia');
    
    // Crear un usuario
    Route::get('/createPonencia', 'PonenciaController@createPonencia');


//PAGOS

    // Visualizar pagos
    Route::get('/allPagos', 'UsersController@indexAllPagos')->name('allPagos');
    Route::get('/editPago', 'UsersController@editPago');
    
    
    
// -----------------------------------------------------------------------------------------------------
// AJAX
// -----------------------------------------------------------------------------------------------------

// USUARIOS
Route::get('/ajaxallUsers', 'UsersController@ajaxIndexUsuarios')->name('ajaxallUsers');
Route::get('/ajaxPeticionAllUser', 'UsersController@ajaxPeticionAllUser')->name('ajaxPeticionAllUser');