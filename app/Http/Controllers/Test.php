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
        $cursos = ModalidadCursoAula::all()->load('modalidad',
        "cursociclo",
        "aula",
        "infousuario"
    )->take(1);
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
            "nombre"=>"Estrategias Algoritmicas",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Computacion Grafica",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Algoritmos y Complejidad",
            "creditos"=>6
        ]);
        $curso = Curso::create([
            "nombre"=>"Lenguajes Formales y Automatas",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Bases de Datos I",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Ingenieria de Software I",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Inteligencia Artificial I",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Compiladores",
            "creditos"=>2
        ]);
        $curso = Curso::create([
            "nombre"=>"Computacion Grafica Avanzada",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Desarrollo de Software",
            "creditos"=>6
        ]);
        $curso = Curso::create([
            "nombre"=>"Percepcion y Vision por Computadora",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Redes de computadoras I",
            "creditos"=>4
        ]);
        
        $curso = Curso::create([
            "nombre"=>"Sistemas Operativos I",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Robotica",
            "creditos"=>4
        ]);
        $curso = Curso::create([
            "nombre"=>"Redes de Computadoras II",
            "creditos"=>6
        ]);
        
        $curso = Curso::create([
            "nombre"=>"Sistemas Operativos II",
            "creditos"=>2
        ]);

        $curso = Curso::create([
            "nombre"=>"Practicas Pre-Profesionales",
            "creditos"=>10
        ]);

        $curso = Curso::create([
            "nombre"=>"Interaccion Humano Computador",
            "creditos"=>4
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Base de Datos",
            "creditos"=>4
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Ing de Software",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Ing de Software Avanzada",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Seguridad Informatica",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Topicos en Tecnologias Inmersivas",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Sistemas de Informacion",
            "creditos"=>6
        ]);

        $curso = Curso::create([
            "nombre"=>"Proyecto de competencias",
            "creditos"=>4
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
            'año'=>2025,
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
        'rolusuario_id'=>1,
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

    public function createRelaciones(){
        ###########
        #   INTELIGENCIA ARTIFICIAL
        ###########
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'infousuario_id'=>1
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'infousuario_id'=>1
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>1,
            'aula_id'=>2,
            'infousuario_id'=>1
        ]);

        ###############################################
        #   TOPICOS DE INGE DE SOFT 
        #######
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>2,
            'aula_id'=>1,
            'infousuario_id'=>3
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>2,
            'aula_id'=>1,
            'infousuario_id'=>3
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>2,
            'aula_id'=>1,
            'infousuario_id'=>3
        ]);

        ######################################################
        # COMPILADORES
        ##################
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>1,
            'cursociclo_id'=>3,
            'aula_id'=>3,
            'infousuario_id'=>2
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>2,
            'cursociclo_id'=>3,
            'aula_id'=>3,
            'infousuario_id'=>2
        ]);
        $modalidadCurso = ModalidadCursoAula::create([
            'modalidad_id'=>3,
            'cursociclo_id'=>3,
            'aula_id'=>3,
            'infousuario_id'=>2
        ]);
    

    ###################################################
    #   ESTRATEGIAS ALGORITMICAS
    ###################################

    $modalidadCurso = ModalidadCursoAula::create([
        'modalidad_id'=>1,
        'cursociclo_id'=>4,
        'aula_id'=>3,
        'infousuario_id'=>4
    ]);
    $modalidadCurso = ModalidadCursoAula::create([
        'modalidad_id'=>2,
        'cursociclo_id'=>4,
        'aula_id'=>3,
        'infousuario_id'=>4
    ]);
    $modalidadCurso = ModalidadCursoAula::create([
        'modalidad_id'=>3,
        'cursociclo_id'=>4,
        'aula_id'=>3,
        'infousuario_id'=>4
    ]);

    return response()->json(["mensaje"=>"realaciones creadas"],status:200);  
  }
}
