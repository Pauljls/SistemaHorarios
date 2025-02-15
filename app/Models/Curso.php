<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\HasMany;
use Illuminate\Database\Eloquent\Model\BelongsTo;

class Curso extends Model
{
    //
    protected $table = "cursos";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function cursociclos():HasMany{
        return $this->hasMany(Ciclo::class,'curso_id');
    }

    public function modalidadCursoAulas():HasMany{
        return $this->hasMany(ModalidadCursoAula::class,'curso_id');
    }
}
