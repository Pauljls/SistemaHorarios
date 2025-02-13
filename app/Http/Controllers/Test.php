<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Condicion;
use App\Models\CategoriaDocente;
use App\Models\InfoUsuario;
use App\Models\RolUsuario;
use Illuminate\Http\Request;

class Test extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$condiciones =  Condicion::all();
        $rol= RolUsuario::first();
        $rol->load('profesores');
        return response()->json($rol);
    }

    public function createRoles()
    {
        //
        $rol = RolUsuario::create([
            'nombre'=>'administrador'
        ]);

        $rol->save();

        $rol1 = RolUsuario::create([
            'nombre'=>'usuario'
        ]);

        $rol1->save();

        return [$rol,$rol1];
    }

    public function createCondiciones(){
        $condicion = Condicion::create([
            'nombre'=>'Principal'
        ]);
        $condicion1 = Condicion::create([
            'nombre'=>'Asociado'
        ]);
        $condicion2 = Condicion::create([
            'nombre'=>'Auxiliar'
        ]);

        $condicion->save();
        $condicion1->save();
        $condicion2->save();
        return [$condicion,$condicion1,$condicion2];
    }

    public function createCategoria(){
        $categoria = CategoriaDocente::create([
            'nombre'=>'Tiempo Completo',
            'horas'=>40
        ]);
        $categoria1 = CategoriaDocente::create([
            'nombre'=>'Tiempo Parcial',
            'horas'=>20
        ]);

        $categoria->save();
        $categoria1->save();
        return [$categoria,$categoria1];
    }

    public function crearProfesor(){
        
        $rol= RolUsuario::where('id',1)->first();
        $condicion = Condicion::where('id',1)->first();
        $categoria = CategoriaDocente::where('id',1)->first();

        $infoUsuario = InfoUsuario::create([
        'nombre'=>'admin',
        'nombre2'=>'admin',
        'apellidoP'=>'admin',
        'apellidoM'=>'admin',
        'telefono'=>'999999',
        'categoriadocente_id'=>$categoria->id,
        'condicion_id'=>$condicion->id,

      ]);
        
      $profesor = Profesor::create([
        'email'=>'admin@gmail.com',
        'password'=>'admin',
        'rolusuario_id'=>$rol->id,
        'infousuario_id'=>$infoUsuario->id
      ]);
      
      return $profesor;
    } 

}
