<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetails;

class CartDetailController extends Controller
{
    public function store(Request $request){
        $error = false;
        $cartDetail = new CartDetails();
        $cartDetail -> cart_id = auth()->user()->cart->id;
        $cartDetail -> product_id = $request->product_id;
        $cartDetail -> quantity = $request->quantity;
        if($cartDetail -> save()){
            $notification = "Se ha agregado el producto a tu carrito";
        }
        else{
            $error = true;
            $notification = "Error al agregar el producto. Prueba más tarde";

        }
        
        return back()->with(compact('notification', 'error'));
    }

    public function delete($id){
        
        $cartDetail = CartDetails::find($id);
        $error = false;
        if($cartDetail->cart_id === auth()->user()->cart->id){
            $cartDetail->delete();
            $notification = "El producto se ha eliminado del carrito correctamente";
        }
        else{
            $error = true;
            $notification = "Error al eliminar el producto del carrito";
        }
       
        return back()->with(compact('notification', 'error'));
    }
}
