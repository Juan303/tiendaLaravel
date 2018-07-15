<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetails;
use App\Cart;

class CartDetailController extends Controller
{
    public function store(Request $request){
        if(auth()->user()){
            $cartDetail -> cart_id = auth()->user()->cart->id;
        }
        else{
            $cart = new Cart;
            $cart -> status = 'active';
            $cart -> guest_id = uniqid();
            $cart ->save();
            $cartDetail -> cart_id = $cart->id;
        }
        $error = false;
        $cartDetail = new CartDetails(); 
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
