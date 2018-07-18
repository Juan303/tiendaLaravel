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
                <h2 class="title">Categorias disponibles</h2>
                <div class="row">
                    <div class="col-5">
                        <form action="{{ url('/search/show') }}" class="">
                            {{ csrf_field() }}
                            <div class="form-group pt-1">
                                <input type="text" placeholder="Buscar..." class="form-control pt-0" name="cadena">
                            </div>
                            <button type="submit" class="btn btn-success btn-just-icon">
                                <i class="material-icons">search</i>
                            </button>
                        </form>
                    </div>
                </div>
                

                <div class="team">
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="card pt-2">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <img src="{{ $category->url_image }}" alt="Imagen de la categoria {{ $category->name }}" class="img-raised rounded img-fluid">
                                </div>
                                <h4 class="card-title">
                                    <a href="{{ url('categories/'.$category->id) }}">{{ $category->name }}</a>
                                </h4>
                                <div class="card-body">
                                <p class="card-description">{{ $category->description }}
                                    <a href="#">links</a> for people to be able to follow them outside the site.</p>
                                </div>
                            </div>    
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
    
    

@endsection
