<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = DB::table('roles')->get();
        return view('roles.listar', compact('roles'));
    }

    public function crear(Request $request){
        
        $request->validate([
            'nombre' => 'required|max:20',
            'desc' => 'required|max:20'
            ]
        );

        DB::table('roles')
                        ->insert([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('desc'),
        ]);

        return redirect()->action('RoleController@index')
                            ->with('status', 'Rol creado!');
    }

    public function editar($id){
        $rol = DB::table('roles')
                        ->where('id', '=', $id)
                        ->get();

        $rol = $rol->first();

        return view('roles.editar', compact('rol'));
    }

    public function actualizar(Request $request, $id){
        $affected = DB::table('roles')
                        ->where('id', '=', $id)
                        ->update([
                            'nombre' => $request->nombreact,
                            'descripcion' => $request->descripcionact
                        ]);
        
        return redirect()->action('RoleController@index')
                ->with('status', 'Rol actualizado con éxito');
    }

    public function borrar($id){
        
        DB::table('roles')
                ->where('id', '=', $id)
                ->delete();

        return redirect()->action('RoleController@index')
                ->with('status', 'Rol eliminado con éxito');
    }
}
