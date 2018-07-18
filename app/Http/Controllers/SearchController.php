<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request){
        $cadena = $request->cadena;

        $products = Product::where('name', 'like', "%$cadena%")->paginate(6);

        return view('search/show')->with(compact('products', 'cadena'));
    }
}
