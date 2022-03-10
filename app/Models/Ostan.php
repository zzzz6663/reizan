<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ostan extends Model
{
    use HasFactory;

    public function shahrs(){
        return $this->hasMany(Shahr::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
