<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = DB::table('users')->get();

        return view('usuarios.listar', compact('usuarios'));
    }

    public function crear(Request $request){
        $request->validate([
            'usuario' => 'required|max:10|unique:users',
            'nombre' => 'required|max:20',
            'apellido' => 'required|max:20',
            'email' => 'required|max:50|unique:users',
            'pass' => 'required|max:100',
            'pass2' => 'required|same:pass'
            ]
        );

        $usuarios = DB::table('users')->insert([
            'usuario' => $request->input('usuario'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'email_verified_at' => now(),
            'password' => $request->input('pass')
        ]);

        return redirect()->action('UsuarioController@index')
                         ->with('status', 'Registro creado!');
    }
}
