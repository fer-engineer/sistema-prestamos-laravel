<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'id_tipo_usuario',
        'id_estado',
        'fecha_creacion',
        'fecha_actualizacion',
    ];

    public $timestamps = false;

    public function tipo_usuario()
    {
        return $this->belongsTo(Tipos_usuario::class, 'id_tipo_usuario', 'codigo');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'codigo');
    }

    public function detalleDocente()
    {
        return $this->hasOne(DetalleDocente::class, 'empleado_id', 'codigo');
    }

    public function detalleEstudiante()
    {
        return $this->hasOne(DetalleEstudiante::class, 'empleado_id', 'codigo');
    }
}
