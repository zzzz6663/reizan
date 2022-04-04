<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{

    use HasFactory;
    protected $fillable=['barcode_id','name','tell','shipping'
        ,'address','comment','img1','img2','img3','bar','defect'
        ,'report','redate','wage','explain','dename','dedate',
        'dewater',
        'dehit',
        'customer_wage',
        'debar',
        'detemp',
        'user_id',
        'deopen',
        'demulti',
        'status',
        'sudate',
        'sms_submit',

        ];
    public function user(){
        return $this->belongsTo(User::class)->latest();
    }
    public function barcode(){
        return $this->belongsTo(Barcode::class)->latest();
    }
    public function loggers(){
        return $this->belongsToMany(Logger::class);
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class)->withPivot('status');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
