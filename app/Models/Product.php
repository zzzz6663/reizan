<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    // use \Bkwld\Cloner\Cloneable;
//     protected $cloneable_relations = ['attributes'
//     , 'gallery'
//     , 'versions'
//     , 'colores'
//     , 'dls'
//     , 'parts'
//     , 'cat'
//     , 'barcodes'
// ];

    protected $fillable=['name','info','color_id','cat_id','version_id','guaranty','thumb','current','link'];


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot(['value_id']);
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function versions()
    {
        return $this->belongsToMany(Version::class);
    }
    public function colores()
    {
        return $this->belongsToMany(Color::class);
    }
    public function dls(){
        return $this->hasMany(Dl::class);
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class);
    }
    public function price()
    {
    return $parts=$this->belongsToMany(Part::class)->sum('price');

    }
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function barcodes(){
        return  $this->hasMany(Barcode::class);
    }
}
