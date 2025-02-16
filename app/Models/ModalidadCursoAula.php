<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModalidadCursoAula extends Model
{
    protected $table = "modalidadcursoaulas";
    public $timestamps = false;

    protected $fillable = [
        'modalidad_id',
        'cursociclo_id',
        'aula_id',
        'infousuario_id'
    ];

    public function modalidad(): BelongsTo
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id');
    }

    public function cursociclo(): BelongsTo
    {
        return $this->belongsTo(CursoCiclo::class, 'cursociclo_id');
    }

    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }

    public function infousuario(): BelongsTo
    {
        return $this->belongsTo(InfoUsuario::class, 'infousuario_id');
    }
}
