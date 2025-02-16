<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Condicion;
use App\Models\CategoriaDocente;
use App\Models\InfoUsuario;
use App\Models\RolUsuario;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Ciclo;
use App\Models\Periodo;
use App\Models\Semestre;
use App\Models\CicloPeriodo;
use App\Models\CursoCiclo;
use App\Models\Modalidad;
use App\Models\ModalidadCursoAula;
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

    public function createData()
    {
        //

        $modalidad = Modalidad::create([
            'nombre'=>'Teoria',

        ]);
        
        $modalidad = Modalidad::create([
            'nombre'=>'Practica',

        ]);
        $modalidad = Modalidad::create([
            'nombre'=>'Laboratorio',

        ]);
        $rol = RolUsuario::create([
            'nombre'=>'administrador'
        ]);

        $rol1 = RolUsuario::create([
            'nombre'=>'usuario'
        ]);
        $condicion = Condicion::create([
            'nombre'=>'Principal'
        ]);
        $condicion1 = Condicion::create([
            'nombre'=>'Asociado'
        ]);
        $condicion2 = Condicion::create([
            'nombre'=>'Auxiliar'
        ]);
        $categoria = CategoriaDocente::create([
            'nombre'=>'Tiempo Completo',
            'horas'=>40
        ]);
        $categoria1 = CategoriaDocente::create([
            'nombre'=>'Tiempo Parcial',
            'horas'=>20
        ]);

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
            "nombre"=>"Proyecto de competencias"
        ]);

        $semestre = Semestre::create([
            'nombre'=>'I'
        ]);
        $semestre = Semestre::create([
            'nombre'=>'II'
        ]);
        $semestre = Semestre::create([
            'nombre'=>'Extraordinario'
        ]);

        $periodo = Periodo::Create([
            'nombre'=>2025,
            'semestre_id'=>3
        ]);

        $ciclo= ciclo::Create([
            'nombre'=>'primero'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'segundo'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'tercero'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'cuarto'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'quinto'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'sexto'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'setimo'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'octavo'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'noveno'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'decimo'
        ]);
        $ciclo= ciclo::Create([
            'nombre'=>'verano'
        ]);
        

        $cicloperiodo = CicloPeriodo::create([
            'ciclo_id'=>11,
            'periodo_id'=>1
        ]);

        $cursoCiclo =  CursoCiclo::create([
            'curso_id'=>7,
            'cicloperiodo_id'=>1
        ]);
        $cursoCiclo =  CursoCiclo::create([
            'curso_id'=>20,
            'cicloperiodo_id'=>1
        ]);
        $cursoCiclo =  CursoCiclo::create([
            'curso_id'=>8,
            'cicloperiodo_id'=>1
        ]);
        $cursoCiclo =  CursoCiclo::create([
            'curso_id'=>1,
            'cicloperiodo_id'=>1
        ]);

        return response()->json(["mensjae"=>'data completada'],status:200);
        
    }

    public function crearProfesor(){
        
        $rol= RolUsuario::where('id',1)->first();
        $condicion = Condicion::where('id',1)->first();
        $categoria = CategoriaDocente::where('id',1)->first();

        $infoUsuario = InfoUsuario::create([
        'nombre'=>'Jorge',
        'nombre2'=>'Luis',
        'apellidoP'=>'Gutierrez',
        'apellidoM'=>'Gutierrez',
        'telefono'=>'999999',
        'categoriadocente_id'=>1,
        'condicion_id'=>1,

      ]);

      $infoUsuario = InfoUsuario::create([
        'nombre'=>'Jose',
        'nombre2'=>'Antonio',
        'apellidoP'=>'Rodriguez',
        'apellidoM'=>'Melquiades',
        'telefono'=>'999999',
        'categoriadocente_id'=>1,
        'condicion_id'=>1

      ]);
      $infoUsuario = InfoUsuario::create([
        'nombre'=>'Carlos',
        'nombre2'=>'Enrique',
        'apellidoP'=>'Castillo',
        'apellidoM'=>'Diestra',
        'telefono'=>'999999',
        'categoriadocente_id'=>1,
        'condicion_id'=>2,

      ]);
      $infoUsuario = InfoUsuario::create([
        'nombre'=>'Yenny',
        'nombre2'=>'Milagros',
        'apellidoP'=>'Sinfuentes',
        'apellidoM'=>'Diaz',
        'telefono'=>'999999',
        'categoriadocente_id'=>1,
        'condicion_id'=>2,

      ]);
        
      $profesor = Profesor::create([
        'email'=>'admin@gmail.com',
        'password'=>'admin',
        'rolusuario_id'=>2,
        'infousuario_id'=>1
      ]);

      $profesor = Profesor::create([
        'email'=>'jose@gmail.com',
        'password'=>'admin',
        'rolusuario_id'=>2,
        'infousuario_id'=>2
      ]);

      $profesor = Profesor::create([
        'email'=>'carlos@gmail.com',
        'password'=>'admin',
        'rolusuario_id'=>2,
        'infousuario_id'=>3
      ]);
      $profesor = Profesor::create([
        'email'=>'yenny@gmail.com',
        'password'=>'admin',
        'rolusuario_id'=>2,
        'infousuario_id'=>4
      ]);
      
      return response()->json(["mensaje"=>'usuarios creados']
      ,status:200);
    }

    public function crearRelaciones(){
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>1
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>1
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>1
        ]);

        ###############################################

        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>3
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>3
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>3
        ]);

        ######################################################
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>2
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>2
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'profesor_id'=>2
        ]);
    }
    //function createCicloxPeriodo(){
    //    $ciclo = Periodo::create([
    //        'año'=>'2025',
    //        'periodo'=>'Extraordinario'
    //    ]);
    //}

}
