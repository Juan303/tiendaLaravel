@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Registrar nuevo producto</h2>
                <form action="{{ url('/admin/products') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label for="name" class="control-label">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                            @if($errors->get('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }} 
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label for="name" class="control-label">Precio</label>
                            <input class="form-control" step="0.01" type="number" name="price" id="price" value="{{ old('price') }}">
                            @if($errors->get('price'))
                                @foreach($errors->get('price') as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }} 
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                         <div class="form-group label-floating">
                            <label for="name" class="control-label">Descripcion Corta</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description') }}">
                            @if($errors->get('description'))
                                @foreach($errors->get('description') as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }} 
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group label-floating text-left">
                            <label for="category" class="control-label">Categoria</label>
                            <select name="category" id="category" class="custom-select">
                                <option value="0">Sin categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="form-group label-floating">
                    <label for="name"  class="control-label">Descripcion completa</label>
                    <textarea class="form-control" name="long_description" id="" cols="30" rows="5">{{ old('long_description') }}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{ url('admin/products') }}" class="btn btn-warning">Volver</a>
                    <button class="btn btn-primary">Siguiente</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
