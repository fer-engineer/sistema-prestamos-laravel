<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marca extends Model
{
    use HasFactory;
    protected $table = "marcas";
    protected $primaryKey = "codigo";

    protected $fillable = ['nombre', 'descripcion', 'fecha_creacion'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'codigo';
    }
}
