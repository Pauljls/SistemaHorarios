<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\RolUsuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Profesor $profesor)
    {
        //
        $bdprofesor = Profesor::where('email',$profesor->email)->first();
        if(!$bdprofesor){
            return response()->json([
                'mensaje'=>'El usuario no existe'
            ]);
        }
        $profesor = Profesor::all();
        return $profesor;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function Logout(Request $request)
    {
        //
    }

}
