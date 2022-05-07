<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ostan_id',
        'shahr_id',
        'family',
        'username',
        'email',
        'mobile',
        'level',
        'address',
        'tel',
        'telegram',
        'instagram',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shahr(){
        return $this->belongsTo(Shahr::class);
    }
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
    public function ubarcodes(){
        return  $this->hasMany(Barcode::class,'user_id');
    }
    public function barcodes(){
        return  $this->belongsToMany(Barcode::class);
    }

    public function cbarcode(){
        return $this->hasMany(Barcode::class,'customer_id');
    }
    public function polls(){
        return $this->hasMany(Poll::class);
    }
    public function repairs(){
        return $this->hasMany(Repair::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function sounds(){
        return $this->hasMany(Sound::class);
    }
    public function to_transfers(){
        return $this->hasMany(Transfer::class,'to_id');
    }
    public function from_transfers(){
        return $this->hasMany(Transfer::class,'from_id');
    }
    public function check_transfer(){
        return $this->to_transfers()->whereStatus(null)->count();
    }


}
