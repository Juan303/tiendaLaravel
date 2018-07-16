<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetails;
use App\Cart;
use NewCart;
use App\Product;


class CartDetailController extends Controller
{
    public function store(Request $request){
        $error = false;
        $product = Product::find($request->product_id);

        if(NewCart::count()>0){
            foreach(NewCart::content() as $cartItem){
                if($cartItem->options->product->id == $product->id){
                    if(!NewCart::update($cartItem->rowId, ($cartItem->qty+$request->quantity))){
                        $error = true;
                    }
                }
            }
        }
        else{
            if(!NewCart::add(uniqid(), $product->name, $request->quantity, $product->price, ['product' => $product])){
                $error = true;
            }
        }
        if($error){
            $notification = "Error al agregar el producto al carrito";
        }
        else{
            $notification = "Producto agregado correctamente";
        }
        
       /*  if(auth()->user()){
            $product = Product::find($request->product_id);
            NewCart::add(auth()->user()->id, $request->product_id, $request->quantity, $product->price);
        }
        else{
            $product = Product::find($request->product_id);
            NewCart::add(uniqid(), $request->product_id, $request->quantity, $product->price);
            $cart = new Cart;
            $cart -> status = 'active';
            $cart -> guest_id = uniqid();
            $cart ->save();
            $cartDetail -> cart_id = $cart->id;
        } */
        
       /* $error = false;
        $cartDetail = new CartDetails(); 
        $cartDetail -> product_id = $request->product_id;
        $cartDetail -> quantity = $request->quantity;
        if($cartDetail -> save()){
            $notification = "Se ha agregado el producto a tu carrito";
        }
        else{
            $error = true;
            $notification = "Error al agregar el producto. Prueba más tarde";
        } */
        
        return back()->with(compact('notification', 'error'));
    }

   /*  public function delete($id){
        
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
    } */

     public function delete($id){
       NewCart::remove($id);
       return back();
    }
}
