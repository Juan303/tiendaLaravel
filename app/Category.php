<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function products(){
        return $this->hasMany(Product::class);
    }

    //ACCESSORS
    public function getUrlImageAttribute(){
        
        return '/images/categories/'.$this->image;
        
    }
}
