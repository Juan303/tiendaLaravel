@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel: Dashboard')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Dashboard</h2>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-icons nav-pills-success" role="tablist">
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
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection


