<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'barcode_id',
        'how_reizan',
        'visit',
        'how_web',
        'introduction',
        'guidance',
        'other',
        'why',
        'service',
        'follow_up',
        'installation_collision',
        'wage',
        'bar',
        'packing',
        'info_packing',
        'appearance',
        'info_appearance',
        'possi',
        'info_possi',
        'wa',
        'info_wa',
        'color',
        'info_color',
        'value',
        'qua',
        'qua_value',
        'info_value',
        'worst',
        'best',
        'rebuy',
        'offer',
        'finish',
    ];
    public function user(){
        return $this->belongsTo(User::class);;
    }
    public function userm(){
        return $this->belongsTo(User::class)->select(array('mobile'));;
    }
    public function barcode(){
        return $this->belongsTo(Barcode::class);
    }
}
