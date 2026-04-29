<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = "platos";

    protected $fillable = ["nombre", "precio", "activo", "descripcion", "imagen", "categoria_plato_id"];

    public function categoriaPlato() {
        return $this->belongsTo(CategoriaPlato::class);
    }

    public function alergenos() {
        return $this->belongsToMany(Alergeno::class);
    }
}
