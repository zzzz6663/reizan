<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'user_id',
        'barcode_id',
        'location',//مکان ارسال صدا
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function barcode(){
        return $this->belongsTo(Barcode::class);
    }

}
