<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function cursociclos():HasMany{
        return $this->hasMany(CursoCiclo::class,'cicloperiodo_id');
    }
}
