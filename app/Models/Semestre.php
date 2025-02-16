<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    //    
    protected $table = "semestres";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function Periodos():HasMany{
        return $this->hasMany(Periodo::class,'semestre_id');
    }
}
