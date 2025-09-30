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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Acotejamiento de la tabla
            $table->id('codigo');
            $table->foreignId('id_equipo')->constrained('equipos','codigo');
            $table->foreignId('id_encargado')->constrained('encargado','codigo');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->foreignId('id_estado')->constrained('estados','codigo');
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
