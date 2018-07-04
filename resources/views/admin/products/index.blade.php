@extends('layouts.app')

@section('body-class', 'product-page sidebar-collapse')

@section('title', 'Listado de productos')

@section('content')

    <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
      
    </div>
    <div class="main main-raised">
        <div class="container">
          
            <div class="section text-center">
                <h2 class="title">Listado de productos</h2>
                <div class="team">
                    <div class="row">
                        <a class="btn btn-success" href="{{ url('admin/products/create') }}">Nuevo producto</a>
                        <table class="table col-md-12">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Nombre</th>
                                    <th class="">Descripción</th>
                                    <th>Categoría</th>
                                    <th class="text-right">Precio</th>
                                    <th class="text-right" style="width:15%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td class="text-right">{{ $product->price }}€</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Detalles" class="btn btn-link px-1 text-info my-0 py-0">
                                            <i class="fa fa-info"></i>
                                        </button>
                                        <a href="{{ url('admin/products/edit/'.$product->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('admin/products/images/'.$product->id) }}" rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <form action="{{ url('admin/products/'.$product->id) }}" method="post" class="d-inline">
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
                        {{ $products-> links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
       
        </div>
    </div>
    @include('includes.footer')
@endsection
