<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'id_marca',
        'modelo',
        'descripcion',
        'id_estado',
        'fecha_adquisicion'
    ];

    public $timestamps = false;

    // Relación con la tabla Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'codigo');
    }

    // Relación con la tabla Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'codigo');
    }
}
