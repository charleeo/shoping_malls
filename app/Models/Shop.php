<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function products(){
        return $this->hasMany([Product::class,'product_shop_id','id']);
    }

    public function Services(){
        return $this->hasMany([ServiceAd::class,'seervice_shop_id','id']);
    }

    public function user(){
        return $this->belongsTo([User::class,'business_owner_id','id']);
    }
}
