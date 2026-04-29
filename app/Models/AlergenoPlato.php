<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlergenoPlato extends Model
{

    protected $fillable = ["plato_id", "alergeno_id"];

    public function plato(){
        return $this->belongsTo(Plato::class);
    }

    public function alergeno(){
        return $this->belongsTo(Alergeno::class);
    }
}
