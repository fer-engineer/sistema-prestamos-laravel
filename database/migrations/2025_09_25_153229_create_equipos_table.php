<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Acotejamiento de la tabla
            $table->id('codigo');
            // clave foranea 'id_marca' que refrencia a 'codigo' en la tabla marcas
            $table->foreignId('id_marca')->constrained('marcas','codigo');
            $table->string('modelo');
            $table->text('descripcion');
            // clave foranea 'id_estado' que refrencia a 'codigo' en la tabla estados
            $table->foreignId('id_estado')->constrained('estados','codigo');
            $table->date('fecha_adquisicion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
