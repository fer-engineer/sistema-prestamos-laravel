<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDocente extends Model
{
    use HasFactory;

    protected $table = 'detalle_docente';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'dui',
        'empleado_id',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'codigo');
    }
}
