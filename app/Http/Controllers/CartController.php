<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function pedido_pendiente(){
        $error = false;
        $cart = auth()->user()->cart;
        $cart->status = "pendiente";
        if($cart->save()){
            $notification = "Su pedido ha pasado a estar pendiente. Le contactaremos lo antes posible via e-mail";
        }
        else{
            $notification = "Error al procesar su carrito puebe de nuevo más tarde";
            $error = true;
        }
        
        return back()->with(compact('notification', 'error'));
    }
}
