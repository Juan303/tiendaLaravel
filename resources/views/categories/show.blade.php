@extends('layouts.app')

@section('body-class', 'profile-page sidebar-collapse')

@section('title', 'Categoria '.$category->name)

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
                <div class="profile">
                    <img src="{{ $category->url_image }}" alt="Imagen de la categoria {{ $category->name }}" class="profile-img img-raised rounded img-fluid">
                  @if(session('notification'))
                    @if(session('error')==false)
                      <div class="alert alert-success">
                          {{ session('notification') }}
                      </div>
                      @else
                      <div class="alert alert-warning">
                          {{ session('notification') }}
                      </div>
                      @endif
                  @endif
                  <div class="name">
                    <h3 class="title">{{ $category->name }}</h3>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="description text-center">
              <p>{{ $category->description }}</p>
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
                <div class="text-center">
                    {{ $products->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
           
          </div>
        </div>
    </div>

  
    @include('includes.footer')
@endsection
