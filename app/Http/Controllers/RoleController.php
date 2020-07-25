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
}
