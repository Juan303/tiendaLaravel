<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{

     private $messages = [
        'photo_title.required' => 'Se necesita un titulo',
        'photo_title.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
    ];

    private $rules = [
        'photo_title' => 'required|min:3',
    ];
    public function index($id){
        $product = Product::find($id);
        $images = $product->product_images()->orderBy('featured', 'DESC')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }
    public function store(Request $request, $id){
        // guardar la imagen en nuestro proyecto


        $this->validate($request, $this->rules, $this->messages);

        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        if($file->move($path, $fileName)){
            // crear un registro de la imagen subida
            $product_image = new ProductImage();
            $product_image->image = $fileName;
            $product_image->name = $request->photo_title;
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

    public function destacar($id, $image_id){

        //quito la opcion de destacada a cualquier otra imagen
        ProductImage::where('product_id', $id) -> update([
            'featured' => false
        ]);
        
        $image = ProductImage::find($image_id); // imagen a destacar
        $image->featured = true;
        $image->save();
        
        return back();
        
    }
}
