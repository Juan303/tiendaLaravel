@extends('layouts.app')

@section('body-class', 'signup-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" filter-color="purple" style="background-image: url('{{ asset('img/bg7.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-5 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">Registro de usuario</h2>
            <div class="card-body p-0">
              <div class="row">

                <div class="col-md-10 m-auto">
                 <!--  <div class="social text-center">
                    <button class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-dribbble">
                      <i class="fa fa-dribbble"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"> </i>
                    </button>
                    <h4> Introduce los datos de registro </h4>
                  </div> -->
                  <form class="form" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="nombre de usuario...">  
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo Electrónico..." autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input id="password" placeholder="Contraseña..."type="password" class="form-control" name="password" required><br>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                       <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">timeline</i>
                          </span>
                        </div>
                        <input id="password-confirm" placeholder="Repite la contraseña..." type="password" class="form-control" name="password_confirmation" required>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-round">Empezar</a>
                    </div>
                    <div class="text-center">
                     <!--  <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                        ¿Has olvidado tu contraseña?
                      </a> -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('includes.footer')
</div>
@endsection
