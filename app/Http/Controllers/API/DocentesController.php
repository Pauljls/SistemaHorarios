<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\InfoUsuario;
use App\Models\Periodo;
use App\Models\CategoriaDocente;
use App\Models\Condicion;
use App\Models\ProfesorDTO;

class DocentesController extends Controller
{
    //
    public function listarDocentes(){

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
            ->paginate(6);
        
        return response()->json($resultados);
    }

    public function categoriaDocente(){
        $categorias = CategoriaDocente::Select('id','nombre')
        ->get();
        return response()->json($categorias);
    }

    public function condicionDocente(){
        $condiciones = Condicion::all();
        return response()->json($condiciones);
    }

    public function crearDocente(ProfesorDTO $request){
        $nuevoinfoprofesor = InfoUsuario::create([
            "nombre"=>$request->nombres,
            "apellidoP"=>$request->apellidos,
            "telefono"=>$request->telefono,
            "direccion"=>$request->direccion,
            "categoriadocente_id"=>$request->categoriaDocente,
            "condicion_id"=>$request->condicion,
        ]);
        
        $crearprofesor = Profesor::create([
            "email"=>$request->email,
            "password"=>$request->password,
            "infousuario_id"=>$nuevoinfoprofesor->id,
            "rolusuario_id"=>$request->rolusuario
        ]);

        if($request->hasFile('image')){
            $nombre = $nuevoinfoprofesor->id.'.'.$request->file('image')->getClientOriginalExtension();
            $img = $request->file('image')->storeAs('public/img',$nombre);
            $nuevoinfoprofesor->image_url='/img/'.$nombre;
            $nuevoinfoprofesor->save();
        }

    }


}
