@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Imágenes de productos')

@section('content')

    <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
      
    </div>
    <div class="main main-raised">
        <div class="container">
          
            <div class="section text-center">
                <h2 class="title">Imagenes del producto "{{ $product->name }}"</h2>
               
               
                <div class="row">
                     <div class="col-3">
                        <form action="{{ url ('admin/products/images/'.$product->id) }}" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Subir imagen</h5>
                                    {{ csrf_field() }}
                                    <div class="custom-file text-left">
                                        <input type="file" name="photo" value="{{ old('photo') }}" class="custom-file-input" id="validatedCustomFile" required lang="es">
                                        <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="photo_title" value="{{ old('photo_title') }}" class="form-control" placeholder="titulo..." required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Subir</button>
                                    </div>
                                     @if($errors->get('photo_title'))
                                       @foreach($errors->get('photo_title') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach ($images as $image)
                    <div class="col-3">
                        @if($image -> featured == true)
                        <div class="card border border-width-2 border-primary mb-3" rel="tooltip" title="Imagen destacada">
                        @else
                        <div class="card mb-3">
                        @endif
                            <img class="card-img-top bg-light" src="{{ $image->url }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $image->name }}</h5>
                                <form action="{{ url('admin/products/images/'.$image->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-outline-dark">Eliminar</button>
                                    @if($image -> featured != true)
                                    <a href="{{ url('admin/products/images/select/'.$product->id.'/'.$image->id) }}" class="btn btn-success btn-just-icon" rel="tooltip" title="Destacar imagen">
                                        <i class="material-icons">favorite</i>
                                    </a>
                                    @endif
                                   
                                </form>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="12">
                        <a href="{{ url('admin/products') }}" class="btn btn-warning">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
