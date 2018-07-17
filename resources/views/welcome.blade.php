@extends('layouts.app')

@section('body-class', 'landing-page sidebar-collapse')

@section('title', 'Mi tienda Laravel')

@section('content')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Bienvenido a mi tienda Arcade.</h1>
                    <h4>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At dolor vitae ut nulla dolorem? Nulla nisi autem 
                    assumenda distinctio optio, sapiente eaque dolor soluta esse dolores nobis quam explicabo eum molestiae consequatur, 
                    reprehenderit error!</h4>
                    <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> ¿Como funciona?
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Productos disponibles</h2>
                <div class="team">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                </div>
                                <h4 class="card-title">
                                    <a href="{{ url('products/'.$product->id) }}">{{ $product->name }}</a>
                                    <br>
                                    <small class="card-description text-muted">{{ $product->category_name }}</small>
                                </h4>
                                <div class="card-body">
                                <p class="card-description">{{ $product->description }}
                                    <a href="#">links</a> for people to be able to follow them outside the site.</p>
                                </div>
                            </div>    
                        </div>
                        @endforeach
                    </div>

                </div>
                 <div class="text-center">
                    {{ $products->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
    
    

@endsection
