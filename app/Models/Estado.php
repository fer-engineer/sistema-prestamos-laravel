<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;
    protected $table = "estados";
    protected $primaryKey = "codigo";

    protected $fillable = ['nombre', 'descripcion', 'tipo_estado'];

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
