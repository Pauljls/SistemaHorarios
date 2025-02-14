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
        'curso_id',
        'aula_id'
    ];

    public function modalidad():BelongsTo{
        return $this->belongsTo(Modalidad::class,'modalidadid_id');
    }

    public function curso():BelongsTo{
        return $this->belongsTo(Curso::class,'curso_id');
    }

    public function Aula():BelongsTo{
        return $this->hasMany(Aula::class,'aula_id');
    }
}
