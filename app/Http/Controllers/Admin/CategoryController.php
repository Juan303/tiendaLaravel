<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(15);
        return view('admin.categories.index')->with(compact('categories'));
    }
    
    public function create(){
        return view('admin.categories.create'); //formulario de registro de categoria
    }
    
    public function store(Request $request){

        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, $this->rules, $this->messages);

        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
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
}
