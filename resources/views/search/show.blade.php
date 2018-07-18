@extends('layouts.app')

@section('body-class', 'profile-page sidebar-collapse')

@section('title', 'Buscar')

@section('styles')
    <style>
        .profile-page .profile img {
            max-width:100%;
            width: 100%;
            margin: 0 auto;
            -webkit-transform: translate3d(0, -25%, 0);
            -moz-transform: translate3d(0, -25%, 0);
            -o-transform: translate3d(0, -25%, 0);
            -ms-transform: translate3d(0, -25%, 0);
            transform: translate3d(0, -25%, 0);
        }
    </style>
@endsection

@section('content')
  <div class="page-header header-filter header-super-small" style="background-image: url('{{ asset('img/profile_city.jpg')}}')"></div>
    <div class="main main-raised">
        <div class="profile-content">
          <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="description text-center">
                        <p>Se encontraron {{ $products->total() }} productos.</p>
                    </div>
                </div>
            </div>
             <div class="team text-center pb-4">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="col-md-6 ml-auto mr-auto">
                                <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <h4 class="card-title">
                                <a href="{{ url('products/'.$product->id) }}">{{ $product->name }}</a>
                            </h4>
                            <div class="card-body">
                            <p class="card-description">{{ $product->description }}
                                <a href="#">links</a> for people to be able to follow them outside the site.</p>
                            </div>
                        </div>    
                    </div>
                    @endforeach
                </div>
                <div class="mx-auto">
                    {{ $products-> appends(['cadena'=>$cadena])->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
           
          </div>
        </div>
    </div>

  
    @include('includes.footer')
@endsection
