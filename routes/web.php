<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* RUTAS */ 

//Listado
Route::get('/','UserController@list');
//Formulario Usuario
Route::get('/form','UserController@userform');
//Guardar Usuario
Route::post('/save','UserController@save')->name('save');
//Edicion de Usuario
Route::get('/editform/{id}', 'userController@editform')->name('editform');
//Editar usuario
Route::patch('/edit/{id}', 'userController@edit')->name('edit');
//Eliminar Usuario
Route::delete('/delete/{id}', 'UserController@delete')->name ('delete');