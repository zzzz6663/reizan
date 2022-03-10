<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shahr extends Model
{
    use HasFactory;
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
