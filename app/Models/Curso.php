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
        'ciclo_id'
    ];

    public function ciclo():BelongsTo{
        return $this->belongsTo(Ciclo::class,'ciclo_id');
    }

    public function modalidadCursoAulas():HasMany{
        return $this->hasMany(ModalidadCursoAula::class);
    }
}
