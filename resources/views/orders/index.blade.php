@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel: Dashboard')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Pedido</h2>
                @if(session('notification'))
                   @if(session('error')==false)
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                    @else
                     <div class="alert alert-warning">
                        {{ session('notification') }}
                    </div>
                    @endif
                @endif
                <!-- <p>Tu carrito de compra tiene {{ count(auth()->user()->cart->details) }} productos</p> -->
                <p>Tu carrito de compra tiene {{ NewCart::count() }} productos</p>
               
                <table class="table col-md-12">
                    <thead>
                        <tr>
                            <th class="">Imagen</th>
                            <th class="">Nombre</th>
                            <th class="text-right">Precio/u</th>
                            <th class="">Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(NewCart::content() as $cartdetail)
                        <tr>
                            <td><img src="{{ $cartdetail->options->product->featured_image_url }}" alt="" height="70px"></td>
                            <td><a href="{{ url('products/'.$cartdetail->options->product->id) }}" target="_blank">{{ $cartdetail->name }}</a></td>
                            <td class="text-right">{{ $cartdetail->price }}&euro;</td>
                            <td>{{ $cartdetail->qty }}</td>
                            <td>{{ $cartdetail->subtotal(2, ".", ".") }}€</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <form action="{{ url('/finalizar_pedido/'.auth()->user()->id) }}" method="post">
                       {{ csrf_field() }}
                        <button class="btn btn-info">
                          <i class="material-icons">done</i> Finalizar el pedido
                        </button>
                        <a href="{{ url('/vaciar_carrito') }}" class="btn btn-warning">Vaciar el carrito</a> 
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection


