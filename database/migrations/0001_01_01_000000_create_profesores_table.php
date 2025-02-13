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

        Schema::create('condiciones',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
        });

        Schema::create('categoriadocentes',function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedInteger('horas')->nullable();
        });


        Schema::create('infousuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre2')->nullable(); // Si puede ser nulo, usa nullable()
            $table->string('apellidoP')->nullable();
            $table->string('apellidoM')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('categoriadocente_id')->constrained('categoriadocentes')->onDelete('cascade')->nullable(); // Usa unsignedBigInteger si en la otra tabla 'id' es bigInt
            $table->foreignId('condicion_id')->constrained('condiciones')->onDelete('cascade')->nullable();
        });


        Schema::create('rolusuarios',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
        });

        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('infousuario_id')->constrained('infousuarios')->onDelete('cascade')->nullable();
            $table->foreignId('rolusuario_id')->constrained('rolusuarios')->onDelete('cascade')->nullable();
        });

        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedInteger('horainicio')->nullable();
            $table->unsignedInteger('horafinal')->nullable();
            $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade')->nullable();

        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('infousuarios');
        Schema::dropIfExists('condiciones');
        Schema::dropIfExists('categoriadocentes');

    }
};
