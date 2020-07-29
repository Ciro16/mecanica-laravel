<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class PermisoController extends Controller
{
    public function index(){
        $permisos = DB::table('permisos')->get();
        return view('permisos.listar', compact('permisos'));
    }

    public function crear(Request $request){
        
        $request->validate([
            'nombre' => 'required|max:20',
            'desc' => 'required|max:20'
            ]
        );

        DB::table('permisos')
                        ->insert([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('desc'),
        ]);

        return redirect()->action('PermisoController@index')
                            ->with('status', 'Permiso creado!');
    }

    public function editar($id){
        $permiso = DB::table('permisos')
                        ->where('id', '=', $id)
                        ->get();

        $permiso = $permiso->first();

        return view('permisos.editar', compact('permiso'));
    }

    public function actualizar(Request $request, $id){
        $affected = DB::table('permisos')
                        ->where('id', '=', $id)
                        ->update([
                            'nombre' => $request->nombreact,
                            'descripcion' => $request->descripcionact
                        ]);
        
        return redirect()->action('PermisoController@index')
                ->with('status', 'Permiso actualizado con éxito');
    }

    public function borrar($id){
        
        DB::table('permisos')
                ->where('id', '=', $id)
                ->delete();

        return redirect()->action('PermisoController@index')
                ->with('status', 'Permiso eliminado con éxito');
    }
}
