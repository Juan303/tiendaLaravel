@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Editar producto #{{ $product->id }}</h2>
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
                <form action="{{ url('/admin/products/update/'.$product->id) }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label for="name" class="control-label">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
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
                            <input class="form-control" type="number" step="0.01"  name="price" id="price" value="{{ old('price', $product->price) }}">
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
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $product->description) }}">
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
                                    <option @if($category->id == old('category_id', $product->category_id)) selected @endif  value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group label-floating">
                    <label for="name"  class="control-label">Descripcion completa</label>
                    <textarea class="form-control" name="long_description" id="" cols="30" rows="5">{{ old('long_description', $product->long_description) }}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{ url('admin/products') }}" class="btn btn-warning">Volver</a>
                    <button class="btn btn-primary">Guardar cambios</button>
                </div>
                </form>
              
                
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
