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
                     <div class="col-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <h5 class="card-title">Subir imagen</h5>
                                {{ csrf_field() }}
                                <input type="file" name="photo" id="inputGroupFile01" required>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                    <a href="{{ url('admin/products') }}" class="btn btn-warning">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach ($images as $image)
                    <div class="col-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">titulo</h5>
                                <form action="{{ url('admin/products/images/'.$image->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
