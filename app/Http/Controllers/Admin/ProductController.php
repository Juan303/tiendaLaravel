<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ImageController;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use File;

class ProductController extends Controller
{
    //mensajes de validacion

    //reglas de validacion

   
    private $flash_messages = [
        'register_product_error' => 'Error al registrar el producto. Pruebe de nuevo más tarde',
        'register_product_success' => 'Producto registrado con éxito'
    ];


    public function index(){
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }


    public function create(){
        $categories = Category::all();
        return view('admin.products.create')->with(compact('categories')); //formulario de registro
    }


    public function store(Request $request){

        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, Product::$rules, Product::$messages);

        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        if($product->save()){
            $notification = "Producto registrado correctamente.";
        }
        else{
            $notification = "Error al registrar el producto. Pruebe de nuevo más tarde.";
            $error = true;
        } //insert

        return redirect('admin/products/images/'.$product->id)->with(compact('notification', 'error'));
    }


    public function edit(Product $product){
        $images = $product->product_images;
        $categories = Category::all();
        return view('admin.products.edit')->with(compact('product', 'images', 'categories')); //formulario de registro
    }


     public function update(Request $request, Product $product){

        $this->validate($request, Product::$rules, Product::$messages);
        $error = false;

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        if($product->save()){
            $notification = "Cambios realizados correctamente.";    
        }
        else{
            $error = true;
            $notification = "Error al registrar los cambios, pruebe de nuevo más tarde."; 
        }//guardo la info

        return back()->with(compact('error', 'notification'));
    }


    public function delete(Product $product){
        $error = false;
        $product_images = $product->product_images;
        foreach($product_images as $product_image){
            $delete = true;
            if(substr($product_image->image, 0, 4) !== 'http'){
                $fullPath = public_path().'/images/products/'.$product_image->image;
                $delete = File::delete($fullPath);
            }
            if($delete){
                $product_image->delete();
            }
        }
        if($product->delete()){
            $notification = "Producto eliminado correctamente";    
        }
        else{
            $error = true;
            $notification = "Error al eliminar el producto, pruebe de nuevo más tarde."; 
        }//borro el producto
        return back()->with(compact('error', 'notification')); // redirect a la pagina anterior
    }


    public function show(Product $product){
        return view('admin.products.edit')->with(compact('product', 'images'));
    }
}
