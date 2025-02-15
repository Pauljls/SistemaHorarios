<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Condicion;
use App\Models\CategoriaDocente;
use App\Models\InfoUsuario;
use App\Models\RolUsuario;
use App\Models\Aula;
use App\Models\Curso;
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
        //$rol= RolUsuario::first();
        //$rol->load('profesores');
        $cursos = Curso::all();
        return response()->json($cursos);
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

    public function createCursos(){
        $curso = Curso::create([
            "nombre"=>"Estrategias Algoritmicas"
        ]);
        $curso = Curso::create([
            "nombre"=>"Computacion Grafica"
        ]);
        $curso = Curso::create([
            "nombre"=>"Algoritmos y Complejidad"
        ]);
        $curso = Curso::create([
            "nombre"=>"Lenguajes Formales y Automatas"
        ]);
        $curso = Curso::create([
            "nombre"=>"Bases de Datos I"
        ]);
        $curso = Curso::create([
            "nombre"=>"Ingenieria de Software I"
        ]);
        $curso = Curso::create([
            "nombre"=>"Inteligencia Artificial I"
        ]);
        $curso = Curso::create([
            "nombre"=>"Compiladores"
        ]);
        $curso = Curso::create([
            "nombre"=>"Computacion Grafica Avanzada"
        ]);
        $curso = Curso::create([
            "nombre"=>"Desarrollo de Software"
        ]);
        $curso = Curso::create([
            "nombre"=>"Percepcion y Vision por Computadora"
        ]);

        $curso = Curso::create([
            "nombre"=>"Redes de computadoras I"
        ]);
        
        $curso = Curso::create([
            "nombre"=>"Sistemas Operativos I"
        ]);
        $curso = Curso::create([
            "nombre"=>"Robotica"
        ]);
        $curso = Curso::create([
            "nombre"=>"Redes de Computadoras II"
        ]);
        
        $curso = Curso::create([
            "nombre"=>"Sistemas Operativos II"
        ]);

        $curso = Curso::create([
            "nombre"=>"Practicas Pre-Profesionales"
        ]);

        $curso = Curso::create([
            "nombre"=>"Interaccion Humano Computador"
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Base de Datos"
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Ing de Software"
        ]);

        $curso = Curso::create([
            "nombre"=>"Ing de Software Avanzada"
        ]);

        $curso = Curso::create([
            "nombre"=>"Seguridad Informatica"
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Tecnologias Inmersivas"
        ]);

        $curso = Curso::create([
            "nombre"=>"Sistemas de Informacion"
        ]);

        $curso = Curso::create([
            "nombre"=>"Proeycto de competencias"
        ]);

        return response()->json([
            "mensaje"=>"Cursos creadoas"
        ], status : 200);
    }

}
