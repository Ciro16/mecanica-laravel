<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = DB::table('users')
                            ->get();

        return view('usuarios.listar', compact('usuarios'));
    }

    public function crear(Request $request){
        $request->validate([
            'usuario' => 'required|max:10|unique:users',
            'nombre' => 'required|max:20',
            'apellido' => 'required|max:20',
            'email' => 'required|max:50|unique:users',
            'pass' => 'required|max:100|min:8',
            'pass2' => 'required|same:pass'
            ]
        );

        $usuarios = DB::table('users')
                            ->insert([
            'usuario' => $request->input('usuario'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'email_verified_at' => now(),
            'password' => $request->input('pass')
        ]);

        return redirect()->action('UsuarioController@index')
                            ->with('status', 'Usuario creado!');
    }

    public function editar($id){
        $usuario = DB::table('users')
                        ->where('id', '=', $id)
                        ->get();

        $usuario = $usuario->first();

        return view('usuarios.editar', compact('usuario'));
    }

    public function actualizar(Request $request, $id){
        $affected = DB::table('users')
                        ->where('id', '=', $id)
                        ->update([
                            'nombre' => $request->nombreact,
                            'apellido' => $request->apellidoact,
                            'email' => $request->correoact,
                            'usuario' => $request->usuarioact
                        ]);
        
        return redirect()->action('UsuarioController@index')
                ->with('status', 'Usuario actualizado con éxito');
    }

    public function borrar($id){
        
        DB::table('users')
                ->where('id', '=', $id)
                ->delete();

        return redirect()->action('UsuarioController@index')
                ->with('status', 'Usuario eliminado con éxito');
    }
}
