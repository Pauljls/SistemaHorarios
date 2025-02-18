<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\InfoUsuario;
use App\Models\Periodo  ;

class DocentesController extends Controller
{
    //
    public function listarDocentes(){
        //$resultado = Periodo::orderBy('id','desc')
        //->with([
        //    'cicloperiodos.cursociclos.modalidadcursos'=>function($query){
        //        $query->take(1);
        //    },
        //    
        //])->first();


        //$resultado = InfoUsuario::with('modalidadCursos')->get();


        $ultimoPeriodo = Periodo::orderBy('año', 'desc')->orderBy('semestre_id', 'desc')->first();

        $resultados = InfoUsuario::select(
                'infousuarios.id',
                'infousuarios.nombre',
                'infousuarios.nombre2',
                'infousuarios.apellidoP',
                'infousuarios.apellidoM',
                'profesores.email',
                'categoriadocentes.nombre as categoria_docente',
                'condiciones.nombre as condicion'
            )
            ->selectRaw('COUNT(DISTINCT cursociclos.id) as total_cursos')
            ->join('modalidadcursoaulas', 'infousuarios.id', '=', 'modalidadcursoaulas.infousuario_id')
            ->join('cursociclos', 'modalidadcursoaulas.cursociclo_id', '=', 'cursociclos.id')
            ->join('cicloperiodos', 'cursociclos.cicloperiodo_id', '=', 'cicloperiodos.id')
            ->join('periodos', 'cicloperiodos.periodo_id', '=', 'periodos.id')
            ->join('profesores', 'infousuarios.id', '=', 'profesores.infousuario_id')
            ->join('categoriadocentes', 'infousuarios.categoriadocente_id', '=', 'categoriadocentes.id')
            ->join('condiciones', 'infousuarios.condicion_id', '=', 'condiciones.id')
            ->where('modalidadcursoaulas.modalidad_id', 1) // Solo modalidad "Teoría"
            ->where('periodos.id', $ultimoPeriodo->id) // Último periodo
            ->groupBy(
                'infousuarios.id',
                'infousuarios.nombre',
                'infousuarios.nombre2',
                'infousuarios.apellidoP',
                'infousuarios.apellidoM',
                'profesores.email',
                'categoriadocentes.nombre',
                'condiciones.nombre'
            )
            ->get();
        


        return response()->json($resultados);
    }
}
