<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Aula;
use App\Models\Modalidad;
use App\Models\CursoCiclo;
use App\Models\Periodo;
use App\Models\InfoUsuario;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarcursos()
    {
        $ultimoPeriodo = Periodo::orderBy('id', 'desc')->first();

        $cursosDelUltimoPeriodo = $ultimoPeriodo->cicloPeriodos()
            ->with([
                'cursociclos.curso',
                'cursociclos.modalidadcursos.modalidad',
                'ciclo'
            ])
            ->get()
            ->flatMap(function ($cicloPeriodo) {
                return $cicloPeriodo->cursociclos->map(function ($cursoCiclo) use ($cicloPeriodo) {
                    return [
                        'curso_id' => $cursoCiclo->curso->id,
                        'curso_nombre' => $cursoCiclo->curso->nombre,
                        'ciclo_nombre' => $cicloPeriodo->ciclo->nombre,
                        'creditos' => $cursoCiclo->curso->creditos,
                        'modalidades' => $cursoCiclo->modalidadcursos->map(function ($modalidadCurso) {
                            return $modalidadCurso->modalidad->nombre;
                        })->unique()->values()->all(),
                        'fecha' => $cursoCiclo->modalidadcursos->map(function ($modalidadCurso) {
                            return $modalidadCurso->created_at;
                        })->unique()->values()->all()
                    ];
                });
            });
        
        $page = request('page', 1); // Obtener el número de página desde la URL, por defecto 1
        $perPage = 6;
        
        $paginado = $cursosDelUltimoPeriodo->forPage($page, $perPage);
        
        return response()->json([
            'data' => $paginado->values(),
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $cursosDelUltimoPeriodo->count(),
            'last_page' => ceil($cursosDelUltimoPeriodo->count() / $perPage)
        ]);
    }
//SELECT DOCENTES
    public function docentes(){
        $docentes = InfoUsuario::all()
        ->select(['id','nombre','apellidoP']);
        return response()->json($docentes);
    }
//SELECT AULAS
    public function aulas(){
        $aulas = Aula::all();
        return response()->json($aulas);
    }
//SELECT MODALIDADES
    public function modalidades(){
        $modalidades = Modalidad::all();
        return response()->json($modalidades);
    }
//SELECT CICLOPERIODO
public function cicloperiodos()
{
    $periodo = Periodo::orderBy('id', 'desc')
        ->with(['cicloperiodos.ciclo:id,nombre'])
        ->select('id')
        ->first();

    // Extraer id y nombre de los ciclos (periodo + ciclo)
    $ciclos = $periodo->cicloperiodos->map(function ($cicloPeriodo) {
        return [
            'id' => $cicloPeriodo->id,
            'nombre' => $cicloPeriodo->ciclo->nombre,
        ];
    });

    return response()->json($ciclos);
}
//SELECT CURSOS
    public function cursos(){
        $cursos = Curso::all()
        ->select('id','nombre');
        return response()->json($cursos);
    }
//CREAR CURSOS EN CICLOS (cicloperiodos + curso)
    public function crearcursociclo(CursoCiclo $curso){
        $nuevocurso = CursoCiclo::create($curso);
        return response()->json($nuevocurso);
    }

    public function listarcursosciclos()
    {
        $periodo = Periodo::orderBy('id', 'desc')
            ->with(['cicloPeriodos.cursociclos.curso:id,nombre'])
            ->select(['id'])
            ->first();
    
        // Transformamos los datos para obtener el id del curso ciclo y el nombre del curso
        $resultados = $periodo->cicloPeriodos->flatMap(function ($cicloPeriodo) {
            return $cicloPeriodo->cursociclos->map(function ($cursoCiclo) {
                return [
                    'id' => $cursoCiclo->id, // ID de CursoCiclo
                    'nombre_curso' => $cursoCiclo->curso->nombre, // Nombre del Curso relacionado
                ];
            });
        });
    
        return response()->json($resultados);
    }
    

//ASIGNACION DE MODALIDADES CURSOS AULAS Y DOCENTES (cursociclo + aula + infousuario + modaldiad)
    public function asignarcursos(ModalidadCursoAula $asignacioncurso){
        $nuevaasignacino = ModalidadCursoAula::Create($asignacioncurso);
        return response()->json(); 
    }


}
