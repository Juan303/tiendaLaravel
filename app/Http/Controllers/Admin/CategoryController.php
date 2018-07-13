<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use File;

class CategoryController extends Controller
{
    
    private $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
        'description.min' => 'El campo descripcion no puede contener menos de 3 caracteres'
    ];

    private $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200|min:3'
    ];
    
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

        $file = $request->file('photo');
        $path = public_path().'/images/categories';
        $fileName = uniqid().$file->getClientOriginalName();
        if($file->move($path, $fileName)){
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->image = $fileName;
            if ($category->save()) {
                $notification = "La categoria ha sido registrada con exito";
            } else {
                $notification = "Error al registrar la categoria. Prueba de nuevo mas tarde";
                $error = true;
            } //insert
        }
        else{
            $error = true;
            $notification = "Error al subir la imagen. Categoria no creada. Prueba de nuevo mas tarde";
        }

        //return redirect('admin/categories/images/'.$product->id)->with(compact('notification', 'error'));
        return redirect('admin/categories')->with(compact('notification', 'error'));
    }
      
    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); //formulario de registro de categorias
    }
}
