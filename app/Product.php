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

    public function getFeaturedImageUrlAttribute(){
        
        $featuredImage = $this->product_images()->where('featured', true)->first();
        if(!$featuredImage){
            $featuredImage = $this->product_images()->first();
            if(!$featuredImage){
                return 'images/products/default.png';
            }
        }
        return $featuredImage->url;
    }
}
