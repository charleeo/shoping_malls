<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function shop(){
        return $this->belongsTo(Shop::class,'product_shop_id','id');
    }

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class,'product_category','id');
    }
}
