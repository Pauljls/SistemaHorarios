<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\DocentesController;
use App\Http\Controllers\API\CursosController;



Route::get('/',[Test::class,'index'])->name('index');

Route::post('/crearProfesor',[Test::class,'crearProfesor'])->name('crearProfesor');
Route::post('/createData',[Test::class,'createData'])->name('createData');
Route::post('/createRelaciones',[Test::class,'createRelaciones'])->name('createRelaciones');

Route::group([
    'middleware'=>'api',
    'prefix'=>'auth'
], function (){
    Route::post('login',LoginController::class);
    Route::post('logout',LogoutController::class);

    //DASHBOARD

    Route::get('Dashboard/cantProfesores',[DashboardController::class,'profesoresTotales'])->name('profesoresTotales');
    Route::get('Dashboard/cursosTotales',[DashboardController::class,'cursosTotales'])->name('cursosTotales');
    Route::get('Dashboard/aulasTotales',[DashboardController::class,'aulasTotales'])->name('aulasTotales');
    Route::get('Dashboard/docentes',[DashboardController::class,'docentes'])->name('docentes');
    Route::get('Dashboard/cursoxcapacidad',[DashboardController::class,'cursoxcapacidad'])->name('cursoxcapacidad');
    Route::get('Dashboard/cursosasignados',[DashboardController::class,'cursosasignados'])->name('cursosasignados');

    //DOCCENTES

    Route::get('Docentes/listarDocentes',[DocentesController::class,'listarDocentes'])->name('listarDocentes');
    Route::get('Docentes/categoriaDocente',[DocentesController::class,'categoriaDocente'])->name('categoriaDocente');
    Route::get('Docentes/condicionDocente',[DocentesController::class,'condicionDocente'])->name('condicionDocente');
    Route::get('Docentes/rolusuario',[DocentesController::class,'rolusuario'])->name('rolusuario');
    Route::get('Docentes/verDocente/{id}',[DocentesController::class,'verDocente'])->name('verDocente');
    Route::post('Docentes/crearDocente',[DocentesController::class,'crearDocente'])->name('crearDocente');
    Route::post('Docentes/actualizarDocente/{id}',[DocentesController::class,'actualizarDocente'])->name('actualizarDocente');

    //CURSOS
    Route::get('Cursos/listarcursos',[CursosController::class,'listarcursos'])->name('listarcursos');
    
}); 

