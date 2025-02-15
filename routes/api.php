<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;
use App\Http\Controllers\API\LoginController;



Route::get('/',[Test::Class,'index'])->name('index');
Route::post('/createRoles',[Test::Class,'createRoles'])->name('create');
Route::post('/createCondiciones',[Test::Class,'createCondiciones'])->name('createConcidiciones');
Route::post('/createCategoria',[Test::class,'createCategoria'])->name('createCategorias');
Route::post('/crearProfesor',[Test::class,'crearProfesor'])->name('crearProfesor');
Route::post('/createAulas',[Test::class,'createAulas'])->name('createAulas');


Route::group([
    'middleware'=>'api',
    'prefix'=>'auth'
], function (){
    Route::post('login',LoginController::class);
}); 

