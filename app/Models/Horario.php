<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\BelongsTo;

class Horario extends Model
{
    //
    protected $table = "horarios";
    public $timestamps = false;

    protected $fillable = [
        'modadlidadcursoaula_id',
        'profesor_id',
        'aula_id',
        'horaInicio',
        'horaFin'
    ];

    public function modalidadCurso():BelongsTo{
        return $this->belongsTo(ModalidadCursoAula::class,'modadlidadcursoaula_id');
    }

    public function profesor():BelongsTo{
        return $this->belongsTo(Profesor::class,'profesor_id');
    }

    public function aula():BelongsTo{
        return $this->belongsTo(Aula::class,'aula_id');
    }

}
