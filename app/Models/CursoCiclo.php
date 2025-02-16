<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CursoCiclo extends Model
{
    protected $table = "cursociclos";
    public $timestamps = false;

    protected $fillable = [
        'curso_id',
        'cicloperiodo_id'
    ];

    // Relación con el modelo Curso
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    // Relación con el modelo CicloPeriodo
    public function ciclo(): BelongsTo
    {
        return $this->belongsTo(CicloPeriodo::class, 'cicloperiodo_id');
    }

    // Relación con ModalidadCursoAula
    public function modalidadcursos(): HasMany
    {
        return $this->hasMany(ModalidadCursoAula::class, 'cursociclo_id');
    }
}

