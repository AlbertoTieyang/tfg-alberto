<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaPlato extends Model
{
    protected $table = "categoriaPlato";

    protected $fillable = ["id", "categoria"];

    public function platos() {
        return $this->hasMany(Plato::class);
    }
}
