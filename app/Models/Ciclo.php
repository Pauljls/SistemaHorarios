<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\BelongsTo;
use Illuminate\Database\Eloquent\Model\HasMany;

class Ciclo extends Model
{
    //
    protected $table = "ciclos";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'periodo_id'
    ];

    public function cursos():HasMany{
        return $this->hasMany(Curso::class);
    }
    public function periodo():BelongsTo{
        return $this->belongsTo(Periodo::class,'periodo_id');
    }

}
