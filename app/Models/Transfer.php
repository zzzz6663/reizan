<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable=[
        'barcode_id',// کلید بارکد
        'repair_id',// کلید تعمیر
        'from_id',// کلید مبدا انتقال
        'to_id',// کلید مقصد انتقال
        'status',// وضعیت
        'type',// نوع انتقال
        'time',// زمان تایید
        'info_from',//اظلاعات اضافی فرستنده
        'info_to',//اظلاعات اضافی گیرنده
     
    ];
    public function barcode(){
        return $this->belongsTo(Barcode::class);
    }
    public function repair(){
        return $this->belongsTo(Repair::class);
    }
    public function from(){
        return $this->belongsTo(user::class,'from_id','id');
    }
    public function to(){
        return $this->belongsTo(user::class,'to_id','id');
    }
}
