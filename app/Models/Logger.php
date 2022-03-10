<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    use HasFactory;
    protected $fillable=['name','info','value','over'];

    public function repairs(){
        return $this->belongsToMany(Repair::class);
    }

//    public function values()
//    {
//        return $this->hasMany(LoggerValue::class);
//    }

}
