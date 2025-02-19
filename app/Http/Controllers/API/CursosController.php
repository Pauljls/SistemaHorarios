<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Periodo;
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

}
