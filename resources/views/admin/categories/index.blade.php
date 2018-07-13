@extends('layouts.app')

@section('body-class', 'category-page sidebar-collapse')

@section('title', 'Listado de categorias')

@section('content')

    <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
      
    </div>
    <div class="main main-raised">
        <div class="container">
          
            <div class="section">
                <h2 class="title">Listado de categorias</h2>
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
                <div class="team">
                    <div class="row">
                        <a class="btn btn-success" href="{{ url('admin/categories/create') }}">Nueva categoria</a>
                        <table class="table col-md-12">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Imagen</th>
                                    <th class="">Nombre</th>
                                    <th class="">Descripción</th>
                                    <th class="text-right" style="width:15%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td><img src="{{ $category->url_image }}" alt="Category image" width="60px"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('admin/categories/edit/'.$category->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/categories/'.$category->id) }}" method="post" class="d-inline">
                                            {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                                            {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                                            <button type="submit" rel="tooltip" title="Eliminar" class="btn px-1 btn-link text-danger my-0 py-0">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>

                                    </td>
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
