<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ["id", "tipo", "correo", "telefono", "personas"];

    public function cliente(){
        return $this->belongsTo(Usuario::class);
    }
}
