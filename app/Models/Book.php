<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{   
    protected $table = "bookings";
    protected $fillable = ["date", "user_id", "type", "description"];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
