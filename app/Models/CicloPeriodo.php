<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CicloPeriodo extends Model
{
    protected $table = "cicloperiodos";
    public $timestamps = false;

    protected $fillable = [
        'ciclo_id',
        'periodo_id',
    ];

    // Corregido: Relación con el modelo Ciclo
    public function ciclo(): BelongsTo
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id'); // Aquí debe ser el modelo Ciclo
    }

    // Corregido: Relación con el modelo Periodo
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'periodo_id'); // Aquí debe ser el modelo Periodo
    }

    // Relación con los CursoCiclos
    public function cursociclos(): HasMany
    {
        return $this->hasMany(CursoCiclo::class, 'cicloperiodo_id');
    }
}
