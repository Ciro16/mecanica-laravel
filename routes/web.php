<?php

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

//Rutas para usuarios
Route::get('/', 'UsuarioController@index');
Route::post('/usuario/crear', 'UsuarioController@crear')->name('usuario.crear');
Route::get('/usuario/editar/{id}', 'UsuarioController@editar')->name('usuario.editar');
Route::put('/usuario/actualizar/{id}', 'UsuarioController@actualizar')->name('usuario.actualizar');