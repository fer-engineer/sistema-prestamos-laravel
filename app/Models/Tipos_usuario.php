<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_usuario extends Model
{
    use HasFactory;
    protected $table = "tipos_usuario";
    protected $primaryKey = "codigo";

    protected $fillable = ['nombre', 'descripcion'];

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
