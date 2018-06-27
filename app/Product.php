<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
use App\Category;


class Product extends Model
{
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
}
