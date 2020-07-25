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

        $roles = DB::table('roles')
                        ->insert([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('desc'),
        ]);

        return redirect()->action('RoleController@index')
                            ->with('status', 'Rol creado!');
    }
}
