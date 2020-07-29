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
Route::get('/', 'UsuarioController@index')->name('/');
Route::get('/usuario', 'UsuarioController@index')->name('/');
Route::post('/usuario/crear', 'UsuarioController@crear')->name('usuario.crear');
Route::get('/usuario/editar/{id}', 'UsuarioController@editar')->name('usuario.editar');
Route::put('/usuario/actualizar/{id}', 'UsuarioController@actualizar')->name('usuario.actualizar');
Route::delete('/usuario/borrar/{id}', 'UsuarioController@borrar')->name('usuario.borrar');

//Rutas para roles
Route::get('/roles', 'RoleController@index')->name('roles.listar');
Route::post('/role/crear', 'RoleController@crear')->name('role.crear');
Route::get('/role/editar/{id}', 'RoleController@editar')->name('role.editar');
Route::put('/role/actualizar/{id}', 'RoleController@actualizar')->name('role.actualizar');
Route::delete('/role/borrar/{id}', 'RoleController@borrar')->name('role.borrar');

//Rutas para permisos
Route::get('/permisos', 'PermisoController@index')->name('permisos.listar');
Route::post('/permiso/crear', 'PermisoController@crear')->name('permiso.crear');
Route::get('/permiso/editar/{id}', 'PermisoController@editar')->name('permiso.editar');
Route::put('/permiso/actualizar/{id}', 'PermisoController@actualizar')->name('permiso.actualizar');
Route::delete('/permiso/borrar/{id}', 'PermisoController@borrar')->name('permiso.borrar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
