<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";

    protected $fillable = ["id", "fecha", "usuario_id", "tipo", "descripcion"];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function cliente(){
        return $this->usuario();
    }
}
