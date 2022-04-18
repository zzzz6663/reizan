<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Barcode extends Model
{
    use Sortable;

    use HasFactory;
    protected $fillable=[
        'product_id',
        'user_id',
        'customer_id',
        'version_id',
        'color_id',
        'code',
        'produce',
        'deliver',
        'guaranty',
        'sell',
        'info',
        'cleared',
        'discount'

    ];
    public $sortable = [
        'product_id',
        'user_id',
        'customer_id',
        'version_id',
        'color_id',
        'code',
        'produce',
        'deliver',
        'guaranty',
        'sell',
        'info',
        'cleared',
        'discount'

    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d h:i:s',
        'deliver' => 'datetime:Y-m-d h:i:s'
    ];
    public function versions(){
        return $this->belongsToMany(Version::class);
    }
//    public function color(){
//        return $this->belongsTo(Color::class);
//    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function customer(){
        return $this->belongsTo(User::class,'customer_id');
    }
    public function operators(){
        return $this->belongsToMany(User::class);
    }
    public function colores(){
        return $this->belongsToMany(Color::class);
    }
    public function repairs(){
        return $this->hasMany(Repair::class);;
    }
    public function polls(){
        return $this->hasMany(Poll::class);
    }
    // public function color(){
    //     return $this->belongsTo(Color::class);
    // }

}
