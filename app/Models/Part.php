<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $fillable= ['name' ,'price'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function repairs()
    {
        return $this->belongsToMany(Repair::class)->withPivot('status');
    }
}
