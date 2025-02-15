<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Condicion;
use App\Models\CategoriaDocente;
use App\Models\InfoUsuario;
use App\Models\RolUsuario;
use App\Models\Aula;
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

        $rol1 = RolUsuario::create([
            'nombre'=>'usuario'
        ]);

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
    
    public function createAulas(){
        $aula = Aula::create([
            'nombre'=>'Info5',
            'capacidad'=>32
        ]);
        $aula1 = Aula::create([
            'nombre'=>'Info3',
            'capacidad'=>20
        ]);
        $aula2 = Aula::create([
            'nombre'=>'Pool17',
            'capacidad'=>40
        ]);
        $aula3 = Aula::create([
            'nombre'=>'Pool12',
            'capacidad'=>35
        ]);
        $aula4 = Aula::create([
            'nombre'=>'Info2',
            'capacidad'=>25
        ]);

        return response()->json([$aula,$aula1,$aula2,$aula3,$aula4]);
    }

}
