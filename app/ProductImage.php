<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
    //
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function destacar($product_id){
        ProductImage::where('product_id', $product_id)->update([
            'featured' => false,
        ]);

        $this->featured = true;
        $this->save();
    }

    public function n_images($product_id){
        $images = ProductImage::where('product_id', $product_id);
        if($images){
            return count($images);
        }
        else{
            return 0;
        }
    }
    
    public function getUrlAttribute(){
        
        if(substr($this->image, 0, 4) === "http"){
            return $this->image;
        }
        return '/images/products/'.$this->image;
        
    }

     
}
