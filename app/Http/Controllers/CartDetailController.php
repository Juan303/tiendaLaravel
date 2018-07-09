<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetails;

class CartDetailController extends Controller
{
    public function store(Request $request){
        $cartDetail = new CartDetails();
        $cartDetail -> cart_id = auth()->user()->cart->id;
        $cartDetail -> product_id = $request->product_id;
        $cartDetail -> quantity = $request->quantity;
        $cartDetail -> save();
        
        return back();
    }

    public function delete($id){
        
        $cartDetail = CartDetails::find($id);
        $error = false;
        if($cartDetail->cart_id === auth()->user()->cart->id){
            $cartDetail->delete();
            $error = true;
            $notification = "El producto se ha eliminado del carrito correctamente";
        }
        else{
            $notification = "Error al eliminar el producto del carrito";
        }
       
        return back()->with(compact('notification', 'error'));
    }
}
