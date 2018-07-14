<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
use App\Category;


class Product extends Model
{
    
    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
        'price.required' => 'El campo del precio es obligatorio',
        'price.numeric' => 'El campo del precio debe ser numérico',
        'price.min' => 'El campo del precio debe ser un numero positivo',
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    //=====================================================ACCESSORS (Es un getter pero que tiene cierta 
    //=====================================================logica por si no hay una categoria, o para que se muestre una imagen destacada)
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

    public function getCategoryNameAttribute(){
        
        if(!isset($this->category->name)){
           return "General";
        }
        return $this->category->name;
    }
}
