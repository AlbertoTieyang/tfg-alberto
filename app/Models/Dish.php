<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public $timestamps = false;

    protected $fillable = ["name", "price", "active", "description", "image", "dish_category_id"];

    public function dishCategory() {
        return $this->belongsTo(DishCategory::class);
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class);
    }
}
