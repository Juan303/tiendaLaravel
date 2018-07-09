@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel: Dashboard')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Bienvenido {{ auth()->user()->name }}</h2>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-icons nav-pills-success mb-3" role="tablist">
                    <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compra
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <hr>
                <p>Tu carrito de compra tiene {{ count(auth()->user()->cart->details) }} productos</p>
               
                <table class="table col-md-12">
                    <thead>
                        <tr>
                            <th class="">Imagen</th>
                            <th class="">Nombre</th>
                            <th class="text-right">Precio/u</th>
                            <th class="">Cantidad</th>
                            <th>Subtotal</th>
                            <th class="text-right" style="width:15%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach(auth()->user()->cart->details as $cartdetail)
                        <tr>
                            <td><img src="{{ $cartdetail->product->featured_image_url }}" alt="" height="70px"></td>
                            <td><a href="{{ url('products/'.$cartdetail->product->id) }}" target="_blank">{{ $cartdetail->product->name }}</a></td>
                            <td class="text-right">{{ $cartdetail->product->price }}&euro;</td>
                            <td>{{ $cartdetail->quantity }}</td>
                            <td>{{ $cartdetail->quantity*$cartdetail->product->price }}&euro;</td>
                            <td class="td-actions text-right">
                                <a href="{{ url('products/'.$cartdetail->product->id) }}" target="_blank"  rel="tooltip" title="Detalles" class="btn btn-link px-1 text-info my-0 py-0">
                                    <i class="fa fa-info"></i>
                                </a>
                                <form action="{{ url('cart/'.$cartdetail->id) }}" method="post" class="d-inline">
                                    {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                                    {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn px-1 btn-link text-danger my-0 py-0">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection


