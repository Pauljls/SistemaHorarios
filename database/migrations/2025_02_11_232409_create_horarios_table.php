<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('modalidades',function(Blueprint $table){
            $table->id();
            $table->string('nombre');

        }); 

        Schema::create('semestres',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
        }); 

        Schema::create('periodos',function(Blueprint $table){
            $table->id();
            $table->string('año')->nullable();
            $table->foreignId('semestre_id')->constrained('semestres')->nullable();
        });

        Schema::create('ciclos',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
        });

        Schema::create('cicloperiodos',function(Blueprint $table){
            $table->id();
            $table->foreignId('ciclo_id')->constrained('ciclos')->onDelete('cascade')->nullable();
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade')->nullable();

        });

        Schema::create('cursos',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedInteger('creditos')->nullable();
            
        });

        Schema::create('cursociclos',function(Blueprint $table){
            $table->id();
            $table->foreignId('cicloperiodo_id')->constrained('cicloperiodos')->onDelete('cascade')->nullable();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade')->nullable();
        });

        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedInteger('capacidad')->nullable();
        });

        Schema::create('modalidadcursoaulas',function(blueprint $table){
            $table->id();
            $table->foreignId('modalidad_id')->constrained('modalidades')->onDelete('cascade')->nullable();
            $table->foreignId('cursociclo_id')->constrained('cursociclos')->onDelete('cascade')->nullable();
            $table->foreignId('infousuario_id')->constrained('infousuarios')->nullable();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade')->nullable();
        });

        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modalidadescursoaula_id')->constrained('modalidadcursoaulas')->onDelete('cascade')->nullable();
            $table->string('dia')->nullable();
            $table->unsignedInteger('horainicio')->nullable();
            $table->unsignedInteger('horafin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
