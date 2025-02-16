<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicloPeriodo extends Model
{
    //
    protected $table = "cicloperiodos";
    public $timestamps = false;

    protected $fillable = [
        'ciclo_id',
        'periodo_id',
    ];

    public function ciclo():BelongsTo{
        return $this->belongsTo(Modalidad::class,'ciclo_id');
    }

    public function periodo():BelongsTo{
        return $this->belongsTo(Curso::class,'periodo_id');
    }
}
