<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\BelongsTo;

class CursoCiclo extends Model
{
    //
    protected $table = "cursociclos";
    public $timestamps = false;

    protected $fillable = [
        'curso_id',
        'ciclo_id'
    ];

    public function curso() :BelongsTo{
        return $this->belongsTo(Curso::class,'curso_id');
    }
    public function ciclo() :BelongsTo{
        return $this->belongsTo(Ciclo::class,'ciclo_id');
    }
}
