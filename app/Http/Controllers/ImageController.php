<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id){

        $product = Product::find($id);
        $images = $product->product_images;
        return view('admin.products.images.index')->with(compact('product', 'images'));


    }
    public function store(Request $request, $id){
        // guardar la imagen en nuestro proyecto
        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        if($file->move($path, $fileName)){
            // crear un registro de la imagen subida
            $product_image = new ProductImage();
            $product_image->image = $fileName;
            //$product_image->featured
            $product_image->product_id = $id;
            $product_image->save();
            
        }    
        return back();
        
    }
    public function delete($id){
       
        $product_image = ProductImage::find($id);
        $deleted = true;
        if(substr($product_image->image, 0, 4) !== 'http'){
            $fullPath = public_path().'/images/products/'.$product_image->image;
            $deleted = File::delete($fullPath); 
        }
        else{
            $deleted = true;
        }
        if($deleted){
            echo "entro";
            $product_image->delete();
        }
        return back();


    }
}
