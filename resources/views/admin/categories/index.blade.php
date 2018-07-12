@extends('layouts.app')

@section('body-class', 'category-page sidebar-collapse')

@section('title', 'Listado de categorias')

@section('content')

    <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
      
    </div>
    <div class="main main-raised">
        <div class="container">
          
            <div class="section text-center">
                <h2 class="title">Listado de categorias</h2>
                <div class="team">
                    <div class="row">
                        <a class="btn btn-success" href="{{ url('admin/products/create') }}">Nueva categoria</a>
                        <table class="table col-md-12">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Nombre</th>
                                    <th class="">Descripción</th>
                                    <th class="text-right" style="width:15%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto">
                        {{ $categories-> links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
       
        </div>
    </div>
    @include('includes.footer')
@endsection
