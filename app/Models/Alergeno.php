<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alergeno extends Model
{
    protected $table = "alergenos";

    protected $fillable = ["id", "type"];

    public function platos(){
        return $this->belongsToMany(Plato::class);
    }
}
