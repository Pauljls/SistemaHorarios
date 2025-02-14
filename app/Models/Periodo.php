<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\HasMany;

class Periodo extends Model
{
    //
    protected $table = "Periodos";
    public $timestamps = false;

    protected $fillable = [
        'año',
        'semestre'
    ];

    public function ciclos():HasMany{
        return $this->hasMany(Ciclo::class,'periodo_id');
    }
    
}
