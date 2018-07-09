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
        $cartDetail->delete();
        return back();
    }
}
