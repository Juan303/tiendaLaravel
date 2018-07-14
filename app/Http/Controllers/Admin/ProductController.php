<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
            $notification = $this->flash_messages['register_product_success'];
        }
        else{
            $notification = $this->flash_messages['register_product_error'];
            $error = true;
        } //insert



        return redirect('admin/products/images/'.$product->id)->with(compact('notification', 'error'));
    }


    public function edit($id){
        $product = Product::find($id);
        $images = $product->product_images;
        return view('admin.products.edit')->with(compact('product', 'images')); //formulario de registro
    }


     public function update(Request $request, $id){

        $this->validate($request, Product::$rules, Product::$messages);


        $product = Product::find($id); //busco el producto donde guardar la info

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        $product->save(); //guardo la info

        return redirect('');
    }


    public function delete($id){
        $product = Product::find($id);
        $product->delete(); //lo borro;
        return back(); // redirect a la pagina anterior
    }


    public function show($id){
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'images'));


    }
}
