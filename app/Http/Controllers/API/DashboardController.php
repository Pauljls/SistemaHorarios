<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\Aula;
use App\Models\InfoUsuario;
use App\Models\ModalidadCursoAula;
use App\Models\Periodo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //  PANEL DE CONTROL CARDS
    
    public function profesoresTotales(){
        $profesores = Profesor::all()->count();
        return response()->json($profesores);
    }
    public function cursosTotales(){
        $cursos = Curso::all()->count();
        return response()->json($cursos);
    }
    public function aulasTotales(){
        $aulas = Aula::all()->count();
        return response()->json($aulas);
    }

    // GRAFICO

public function cursoxcapacidad() {
    $periodo = Periodo::orderBy('id', 'desc')
        ->with([
            'cicloPeriodos.cursociclos.modalidadcursos.aula',
            'cicloPeriodos.cursociclos.modalidadcursos.modalidad',
            'cicloPeriodos.cursociclos.curso'
        ])
        ->first();

    $resultado = [];

    foreach ($periodo->cicloPeriodos as $cicloPeriodo) {
        foreach ($cicloPeriodo->cursociclos as $cursoCiclo) {
            foreach ($cursoCiclo->modalidadcursos as $modalidadCurso) {
                $resultado[] = [
                    'curso_nombre' => $cursoCiclo->curso->nombre,
                    'aula_capacidad' => $modalidadCurso->aula->capacidad,
                    'modalidad_nombre' => $modalidadCurso->modalidad->nombre // Aquí se agrega el nombre de la modalidad
                ];
            }
        }
    }

    return response()->json($resultado);
}



    //  CURSOS ASIGNADOS

    public function cursosasignados()
    {
        $periodo = Periodo::orderBy('id', 'desc')
        ->with(['cicloPeriodos' => function ($query) {
            $query->withCount('cursociclos'); // Contamos los cursociclos dentro de cicloPeriodos
        }])
        ->first();

    // Sumamos todos los conteos de cursociclos de cada cicloPeriodo
    $totalCursociclos = $periodo->cicloPeriodos->sum('cursociclos_count');

    return response()->json([
        'total_cursociclos' => $totalCursociclos
    ]);
    
}
    
    
    //  DOCENTES

    public function docentes(){
        $docentes = InfoUsuario::take(3)->get()->load('condicion',"profesor");
        return response()->json($docentes,status: 200);
    }

}
