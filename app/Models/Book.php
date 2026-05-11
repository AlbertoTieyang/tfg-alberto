<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{   
    protected $table = "bookings";
    protected $fillable = ["date", "user_id", "type", "description", "people", "confirmation_token", "confirmation_expires_at", "confirmed_at",];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
{
    return [
        "confirmation_expires_at" => "datetime",
        "confirmed_at" => "datetime",
    ];
}
}
