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

        Schema::create('periodos',function(Blueprint $table){
            $table->id();
            $table->string('año')->nullable();
            $table->string('semestre')->nullable();
            
        });

        Schema::create('ciclos',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade')->nullable();

        });

        Schema::create('cursos',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->foreignId('ciclo_id')->constrained('ciclos')->onDelete('cascade')->nullable();
        });

        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedInteger('capacidad')->nullable();
        });

        Schema::create('modalidadcursoaulas',function(blueprint $table){
            $table->id();
            $table->foreignId('modalidad_id')->constrained('modalidades')->onDelete('cascade')->nullable();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade')->nullable();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade')->nullable();
        });

        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modalidadescursoaula_id')->constrained('modalidadcursoaulas')->onDelete('cascade')->nullable();
            $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade')->nullable();
            //$table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade')->nullable();
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
