<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rols";

    protected $fillable = ["id", "rol"];

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }

}
