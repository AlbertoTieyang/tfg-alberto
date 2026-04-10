<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlergenoPlato extends Model
{
    protected $fillable = ["platoId", "alergenosId"];
    //
    public function platos(){
        return $this->belongsToMany(Plato::class);
    }
}
