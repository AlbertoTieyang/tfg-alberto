<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    public $timestamps = false;

    protected $fillable = ["category"];

    public function dishes() {
        return $this->hasMany(Dish::class);
    }
}
