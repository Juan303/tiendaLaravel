@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Mi tienda Laravel')

@section('content')

    <div class="page-header header-filter header-super-small" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
        
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Registrar nueva categoria</h2>
                <form action="{{ url('/admin/categories') }}" method="post">
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
                </div>
                <div class="form-group label-floating">
                    <label for="name"  class="control-label">Descripcion</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                     @if($errors->get('description'))
                        @foreach($errors->get('description') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <a href="{{ url('admin/categories') }}" class="btn btn-warning">Volver</a>
                    <button class="btn btn-primary">Siguiente</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
