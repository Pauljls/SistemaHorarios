<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\InfoUsuario;
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

    //  GRAFICO

    //public function cursoxcapacidad(){
    //
    //}

    //  DOCENTES

    public function docentes(){
        $docentes = InfoUsuario::all()->load('condicion');
        return response()->json($docentes,status: 200);
    }

}
