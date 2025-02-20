<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\InfoUsuario;
use App\Models\RolUsuario;
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
                //'infousuarios.nombre2',
                'infousuarios.apellidoP',
                //'infousuarios.apellidoM',
                'infousuarios.telefono',
                'profesores.email',
                'categoriadocentes.nombre as categoria_docente',
                'condiciones.nombre as condicion',
                'image_url'
            )
            ->selectRaw('COALESCE(COUNT(DISTINCT cursociclos.id), 0) as total_cursos') // Asegura que sea 0 si no tiene cursos
            ->join('profesores', 'infousuarios.id', '=', 'profesores.infousuario_id') // Relación directa con profesores
            ->leftJoin('categoriadocentes', 'infousuarios.categoriadocente_id', '=', 'categoriadocentes.id')
            ->leftJoin('condiciones', 'infousuarios.condicion_id', '=', 'condiciones.id')
            ->leftJoin('modalidadcursoaulas', function ($join) use ($ultimoPeriodo) {
                $join->on('infousuarios.id', '=', 'modalidadcursoaulas.infousuario_id')
                     ->where('modalidadcursoaulas.modalidad_id', 1);
            })
            ->leftJoin('cursociclos', 'modalidadcursoaulas.cursociclo_id', '=', 'cursociclos.id')
            ->leftJoin('cicloperiodos', function ($join) use ($ultimoPeriodo) {
                $join->on('cursociclos.cicloperiodo_id', '=', 'cicloperiodos.id')
                     ->where('cicloperiodos.periodo_id', $ultimoPeriodo->id);
            })
            ->groupBy(
                'infousuarios.id',
                'infousuarios.nombre',
                //'infousuarios.nombre2',
                'infousuarios.apellidoP',
                //'infousuarios.apellidoM',
                'infousuarios.telefono',
                'infousuarios.image_url',
                'profesores.email',
                'categoriadocentes.nombre',
                'condiciones.nombre',

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

    public function rolusuario(){
        $roles = RolUsuario::all();
        return response()->json($roles);
    }

    public function verDocente($id){
        $docente = InfoUsuario::where('id', $id)
            ->with([
                'profesor' => function($query) {
                    $query->select('id', 'infousuario_id', 'email', 'rolusuario_id')
                          ->with('rolusuario');
                },
                'categoriaDocente:id,nombre',
                'condicion:id,nombre'
            ])
            ->select([
                'id', 
                'nombre', 
                'apellidoP', 
                'categoriadocente_id',
                'telefono',
                'direccion', 
                'condicion_id',
                'image_url'
            ])
            ->first();

        return response()->json($docente);
    }
    

    public function crearDocente(Request $request)
    {
        $nuevoinfoprofesor = InfoUsuario::create([
            "nombre" => $request->input('nombres'),
            "apellidoP" => $request->input('apellidos'),
            "telefono" => $request->input('telefono'),
            "direccion" => $request->input('direccion'),
            "categoriadocente_id" => $request->input('categoriaDocente'),
            "condicion_id" => $request->input('condicion'),
            "image_url"=>asset('images/profile.jpg')
        ]);
    
        $crearprofesor = Profesor::create([
            "email" => $request->input('email'),
            "password" => bcrypt($request->input('password')),
            "infousuario_id" => $nuevoinfoprofesor->id,
            "rolusuario_id" => $request->input('rolusuario')
        ]);
    
        if ($request->hasFile('image')) {
            $nombre = $nuevoinfoprofesor->id . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $request->file('image')->storeAs('/images',$nombre);
            $nuevoinfoprofesor->image_url = env('APP_URL').':8000'.'/storage'.'/images/'.$nombre;
            $nuevoinfoprofesor->save();
        }
    
        return response()->json($nuevoinfoprofesor);
    }


    public function actualizarDocente(Request $request, $id){
            $infoprofesor = InfoUsuario::where('id',$id)->first();
            
            if($request->hasFile('image')){
                // Si existe una imagen previa
                if($infoprofesor->image_url){
                    // Extraer solo el nombre del archivo de la URL completa
                    $currentImagePath = basename($infoprofesor->image_url);
                    // Eliminar de la ruta correcta
                    Storage::disk('public')->delete('images/' . $currentImagePath);
                }
                
                // Guardar la nueva imagen (solo una vez)
                $nombre = $request->id . '.' . $request->file('image')->getClientOriginalExtension();
                $img = $request->file('image')->storeAs('images', $nombre, 'public');
                $infoprofesor->image_url = env('APP_URL').':8000'.'/storage'.'/images/'.$nombre;
                $infoprofesor->save();
            }
            
            $infoprofesor->update([
                "nombre" => $request->input('nombres'),
                "apellidoP" => $request->input('apellidos'),
                "telefono" => $request->input('telefono'),
                "direccion" => $request->input('direccion'),
                "categoriadocente_id" => $request->input('categoriaDocente'),
                "condicion_id" => $request->input('condicion'),
            ]);
            
            $infoprofesor->profesor->update([
                "email" => $request->input('email'),
                "rolusuario_id"=>$request->input("rolusuario")
            ]);
            
            return response()->json($infoprofesor);
        }
    
    public function eliminarDocente($id){
        $docente = InfoUsuario::where('id',$id)
        ->first();
        $docente->delete();

    }

}
