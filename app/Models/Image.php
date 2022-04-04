<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;
    protected $fillable=[
        'user_id',
        'repair_id',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function repair(){
        return $this->belongsTo(Repair::class);
    }
    public function ima(){
        return $this->belongsTo(Repair::class);
    }
    public function  img(){
        if($this->name){
            return  asset('/src/repair/'.$this->name);
        }
        return false;
    }
}
