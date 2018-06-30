<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }
    public function create(){
        return view('admin.products.create'); //formulario de registro
    }
    public function store(Request $request){

        //dd($request->all()); //muestra todos los datos request
        
        //mensajes de validacion
        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
            'description.required' => 'El campo descripcion es obligatorio',
            'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
            'price.required' => 'El campo del precio es obligatorio',
            'price.numeric' => 'El campo del precio debe ser numérico',
            'price.min' => 'El campo del precio debe ser un numero positivo',
        ];
        
        //reglas de validacion
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];

        $this->validate($request, $rules, $messages);


        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        $product->save(); //insert

        return redirect('admin/products');
    }
    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }

     public function update(Request $request, $id){

        //mensajes de validacion
        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
            'description.required' => 'El campo descripcion es obligatorio',
            'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
            'price.required' => 'El campo del precio es obligatorio',
            'price.numeric' => 'El campo del precio debe ser numérico',
            'price.min' => 'El campo del precio debe ser un numero positivo',
        ];

        //reglas de validacion
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];

        $this->validate($request, $rules, $messages);


        $product = Product::find($id); //busco el producto donde guardar la info

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        $product->save(); //guardo la info

        return redirect('admin/products');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete(); //lo borro;
        return back(); // redirect a la pagina anterior
    }
}
