<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEstudiante extends Model
{
    use HasFactory;

    protected $table = 'detalle_estudiante';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'nie',
        'empleado_id',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'codigo');
    }
}
