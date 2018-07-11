<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    //=============================VARIABLES
    private $messages = [
        'photo_title.required' => 'Se necesita un titulo',
        'photo_title.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
    ];

    private $rules = [
        'photo_title' => 'required|min:3',
    ];

    private $flash_messages = [
        'register_image_error' => 'Error al registrar la imagen. Pruebe de nuevo más tarde',
        'register_image_success' => 'Imagen registrada con éxito'
    ];
    //=============================



    public function index($id){
        $product = Product::find($id);
        $images = $product->product_images()->orderBy('featured', 'DESC')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id){
        // guardar la imagen en nuestro proyecto

        $error = false;
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
            if($product_image->save()){
                if(count(Product::find($id)->product_images) == 1){
                     $product_image->destacar($id);
                }
                $notification = $this->flash_messages['register_image_success'];
            }
            else{
                $error = true;
                $notification = $this->flash_messages['register_image_error'];
            }
            
        }    
        return back()->with(compact('notification', 'error'));
        
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
            $product_image->delete();
            if ($product_image->featured == true) {
                $product = $product_image->product;
                $image = $product->product_images->first();
                if ($image) {
                    $image->destacar($product->id);
                }
            }

        }
        return back();
    }

    public function destacar_imagen($product_id, $image_id){

        $product_image = ProductImage::find($image_id);
        $product_image->destacar($product_id);
        
        return back();
    }


}
