<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CursoCiclo extends Model
{
    //
    protected $table = "cursociclos";
    public $timestamps = false;

    protected $fillable = [
        'curso_id',
        'cicloperiodo_id'
    ];

    public function curso() : BelongsTo
    {
        return $this->belongsTo(Curso::class,'curso_id');
    }
    public function ciclo() : BelongsTo
    {
        return $this->belongsTo(Ciclo::class,'cicloperiodo_id');
    }
    public function modalidadcursos() : HasMany
    {
        return $this->hasMany(ModalidadCursoAula::class,'cursociclo_id');
    }
}
