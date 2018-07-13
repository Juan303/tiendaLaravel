@extends('layouts.app')

@section('body-class', 'category-page sidebar-collapse')

@section('title', 'Mi tienda Laravel')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Editar categoria #{{ $category->id }}</h2>
                 @if(session('notification'))
                    @if(session('error')==false)
                        <div class="alert alert-success mt-4">
                            {{ session('notification') }}
                        </div>
                    @else
                        <div class="alert alert-warning mt-4">
                            {{ session('notification') }}
                        </div>
                    @endif
                @endif
                <form action="{{ url('/admin/categories/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label for="name" class="control-label">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
                            @if($errors->get('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group label-floating">
                    <label for="name"  class="control-label">Descripcion</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ old('description', $category->description) }}</textarea>
                    @if($errors->get('description'))
                        @foreach($errors->get('description') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-4">
                       <img class="img-fluid img-thumbnail" src="{{ $category->url_image }}" alt="">
                    </div>
                    <div class="col-8">
                         <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Imagen de la categoria</h5>
                                <div class="custom-file text-left">
                                    <input type="file" name="image" value="{{ old('photo') }}" class="custom-file-input" id="validatedCustomFile" lang="es">
                                    <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
                <div class="form-group">
                    <a href="{{ url('admin/categories') }}" class="btn btn-warning">Volver</a>
                    <button class="btn btn-primary">Registrar cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
