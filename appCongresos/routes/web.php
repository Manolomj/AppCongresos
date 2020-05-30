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

Route::get('/ponenteCreate', 'VistasController@createPonente')->name('ponenteCreate');



//ADMIN

Route::get('/admin', 'AdminController@index')->name('admin');



//CORREO
Route::post('/contacto', 'ContactoController@correo'); 




//PONENCIAS

Route::resource('ponencia', 'PonenciasController');


//PRUEBA
Route::get('/prueba', 'VistasController@prueba')->name('prueba');

