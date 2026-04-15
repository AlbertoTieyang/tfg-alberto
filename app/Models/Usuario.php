<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ["id", "name", "email", "password"];

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }
}
