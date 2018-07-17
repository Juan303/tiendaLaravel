<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NewCart;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        return view('/orders/index');
    }

    public function finalizar_pedido($user_id){

        //return NewCart::content();
        $error = false;

        $content = NewCart::content();

        $order = new Order();
        $order->content = serialize($content);
        $order->user_id = auth()->user()->id;
        if($order->save()){
            $notification = "Pedido realizado correctamente. Puede comprobar sus pedidos en la seccion 'Pedidos realizados' de su panel de control";
        }
        else{
            $notification = "Error al realizar el pedido. Pruebe de nuevo mas tarde";
            $error = true;
        }
        NewCart::destroy();
        return redirect('home')->with(compact('notification', 'error'));


        
   /*      $this->getConnection()->table($this->getTableName())->insert([
            'identifier' => $identifier,
            'instance' => $this->currentInstance(),
            'content' => serialize($content),
        ]);

        $this->events->fire('cart.stored'); */







       /*  $error = false;
        if($user_id == auth()->user()->id){
            if(NewCart::store(auth()->user()->id)){
                $notification = "Pedido realizado correctamente. En breve nos pondremos en contacto con usted via e-mail";
            }
            else{
                $notification = "Error al procesar el pedido. Póngase en contacto con nosotros o pruebe de nuevo más tarde";
                $error = true;
            }
        }
        else{
            $notification = "Error al procesar el pedido. Póngase en contacto con nosotros o pruebe de nuevo más tarde";
            $error = true;
        }
        return back()->with(compact('error', 'notification')); */
    }
}
