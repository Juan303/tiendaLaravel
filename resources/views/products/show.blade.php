@extends('layouts.app')

@section('body-class', 'profile-page sidebar-collapse')

@section('title', 'Listado de productos')

@section('content')
  <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')"></div>
    <div class="main main-raised">
        <div class="profile-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="profile">
                  <div class="avatar">
                    <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised full-rounded img-fluid">
                  </div>
                  <div class="name">
                    <h3 class="title">{{ $product->name }}</h3>
                    <h6>{{ $product->category_name }}</h6>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="description text-center">
              <p>{{ $product->long_description }}</p>
            </div>
            <div class="text-center">
                <button class="btn btn-success rounded" data-toggle="modal" data-target="#modalAddToCart">Agregar al carrito</button>
                
            </div>
            
            <!-- Modal -->
          
            
            
            <div class="tab-content tab-space">
              <div class="tab-pane active text-center gallery" id="studio">
              
                <div class="row">
                  <div class="col-md-3 ml-auto">
                    @for($i=0; $i < count($images); $i+=2)
                        <img src="{{ $images[$i] -> url }}" class="rounded">
                    @endfor
                  </div>
                  <div class="col-md-3 mr-auto">
                   @for($i=1; $i < count($images); $i+=2)
                        <img src="{{ $images[$i] -> url }}" class="rounded">
                    @endfor
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
   <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cantidad a añadir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/cart') }}" method="post">
             {{ csrf_field() }}
             <input type="hidden" name="product_id" value="{{ $product->id }}">

              <div class="modal-body">
                <input type="number" name="quantity" id="quantity" value="1" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir al carrito</button>
              </div>
         </form>
        </div>
      </div>
    </div>
    @include('includes.footer')
@endsection
