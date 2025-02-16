<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalidadCursoAula extends Model
{
    
    //
    protected $table = "modalidadcursoaulas";
    public $timestamps = false;

    protected $fillable = [
        'modalidad_id',
        'cursociclo_id',
        'aula_id',
        'profesor_id'
    ];

    public function modalidad():BelongsTo{
        return $this->belongsTo(Modalidad::class,'modalidadid_id');
    }

    public function curso():BelongsTo{
        return $this->belongsTo(Curso::class,'cursociclo_id');
    }

    public function Aula():BelongsTo{
        return $this->belongsTo(Aula::class,'aula_id');
    }

    public function Profesor():BelongsTo{
        return $this->belongsTo(Profesor::class,'profesor_id');
    }
}
