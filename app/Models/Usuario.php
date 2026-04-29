<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";

    protected $fillable = ["id", "nombre", "correo", "contrasena", "rol_id"];

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }

    public function rol() {
        return $this->belongsTo(Rol::class);
    }
}
