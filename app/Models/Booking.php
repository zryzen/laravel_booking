<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }

    public function trip(){
        return $this->hasOne(Trip::class);
    }

    protected $fillable = [
        'user_id',
        'trip_id',
    ];
}
