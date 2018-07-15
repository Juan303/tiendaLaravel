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
                                        <a href="{{ url('products/'.$product->id) }}" target="_blank" rel="tooltip" title="Detalles" class="btn btn-link px-1 text-info my-0 py-0">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('admin/products/edit/'.$product->id) }}"  rel="tooltip" title="Editar datos" class="btn btn-link px-1 text-success px-0 my-0 py-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('admin/products/images/'.$product->id) }}" rel="tooltip" title="Editar imagenes" class="btn btn-link px-1 text-warning px-0 my-0 py-0">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <form action="{{ url('admin/products/'.$product->id) }}" method="post" class="d-inline">
                                            {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                                            {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                                            <button type="submit" rel="tooltip" title="Eliminar producto" class="btn px-1 btn-link text-danger my-0 py-0">
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
                        {{ $products-> links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
       
        </div>
    </div>
    @include('includes.footer')
@endsection
